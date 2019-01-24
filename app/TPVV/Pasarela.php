<?php 

namespace App\TPVV;

use App\TPVV\Objects\Item;
use App\TPVV\Objects\Request;
use App\TPVV\Objects\Response;
use App\TPVV\Objects\Struct;
use App\User;
use App\Transaccion;
use Illuminate\Support\Facades\Hash;

class Pasarela {
    
    private $web;
    private $idPedido;
    private $carrito;
    private $request;
    private $response;
    private $precioAsignado; //boolean
    private $precioFinal;
    private $key;
    private $idComercio;

    //***** INICIO *****/

    function __construct($w,$idP,$key=NULL) {
        $this->web = $w;
        $this->idPedido = $idP;
        $this->carrito = array();
        $this->request = NULL;
        $this->response = NULL;
        $this->precioAsignado = false;
        $this->precioFinal = 0;
        $this->key=$key;
    }

    public function AnadirProducto($nombre,$precio){
        $item = new Item($nombre,$precio);
        array_push($this->carrito,$item);
    }

    public function AsignarPrecioFinal($precio){ //Para aplicar algun descuento
        $this->precioAsignado = true;
        $this->precioFinal = $precio;
    }

    //**** COMERCIO ****\\ Generar A

    public function GetURL(){
        if(count($this->carrito)>0 && $this->precioAsignado) 
            return "http://185.207.145.237/generar/".$this->web;
        return false;
    }

    public function GetREQUEST(){
        if(count($this->carrito)>0 && $this->precioAsignado){
            $struct = new Struct($this->web,$this->idPedido,$this->carrito,$this->precioFinal); //Input->AES
            $tokens = $struct->Encode('Request',$this->key);
            if(!empty($tokens) && count($tokens)==2){
                $this->request = new Request($this->web,$this->idPedido,$tokens['struct'],$tokens['token']);
                $html = sprintf('<input type="hidden" name="tpvv_request" value="%s">',$this->request->ToString($this->key));
                return $html;
            } else {
                $this->request = false;
            }
        }
        return false;
    }    

    //**** SERVIDOR ****\\ Validar A

    public function SetREQUEST($data){  
        if(isset($data)){
            $result = User::where('nick',$this->web)->get();
            
            if(isset($result) && count($result)==1){ 
                $this->idComercio= $result[0]->id;
                $this->key= $result[0]->key;
                $request = new Request();
                $this->request = $request->Fill($result[0]->key,$data);
            }
        }
    }

    public function CreateTransaction(){ //Incluye validacion
        if(isset($this->request) && $this->request instanceof Request){
            $struct = $this->request->Validate($this->web);
            if($struct !=false && is_array($struct)){
                $t = new Transaccion();
                $t->idComercio = $this->idComercio;
                $t->Pedido = $struct['idPedido'];
                $t->sha = hash("sha256",serialize($struct));
                $t->carro = @openssl_encrypt(serialize($struct['carro']), "AES-256-CBC", $this->key);
                $t->importe = $struct['precio'];
                $t->timestamps = true;
                $result = Transaccion::where('sha',$t->sha)->get();
                $t->idEstado = 1;
                if(count($result)==0){
                    $t->save();            
                    return $t->sha;
                }else {
                    return $result[0]->sha;
                }
            }
        }
            return 'error';
    }
   
    //**** SERVIDOR ****\\ Generar B


    public function AsignTransaction($transaccion){
        $struct = new Struct($this->web,$this->idPedido,NULL,NULL,$transaccion->_idEstado->descripcion,date("Y-m-d H:i:s"));
        $response = new Response($this->web,$this->idPedido,NULL,NULL);
        $response->CompleteData($this->key,$struct);
        $this->response = $response;
    }

    public function GetRESPONSE(){
        if(isset($this->web) && isset($this->idPedido) && $this->response instanceof Response){
            return $this->response->ToString($this->key);
        }
    }

    //**** SERVIDOR ****\\ Validar B


    public function SetRESPONSE($data){ 
        $input = $data->input('response');
        if(isset($input)){
            $response = new Response();
            $this->response = $response->Fill($this->key,$input);
        }
    }

    public function ValidateResponse(){ //devuelve Struct como array de los campos necesarios (4)
        if(isset($this->response) && $this->response instanceof Response){
            return $this->response->Validate($this->web);
        }
        return false;
    }

}




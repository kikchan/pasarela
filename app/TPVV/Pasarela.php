<?php 

namespace App\TPVV;

use App\TPVV\Objects\Item;
use App\TPVV\Objects\Request;
use App\TPVV\Objects\Struct;

use Illuminate\Support\Facades\Hash;

class Pasarela {
    
    private $web;
    private $idPedido;
    private $carrito;
    private $request;
    private $output;
    private $precioAsignado; //boolean
    private $precioFinal;

    //*****  *****/

    function __construct($w,$idP) {
        $this->web = $w;
        $this->idPedido = $idP;
        $this->carrito = array();
        $this->request = "";
        $this->output = "";
        $this->precioAsignado = false;
        $this->precioFinal = 0;
    }

    public function AnadirProducto($nombre,$precio,$cantidad){
        $item = new Item($nombre,$precio,$cantidad);
        array_push($this->carrito,$item);
        if(!$this->precioAsignado)
            $this->precioFinal += $precio*$cantidad;
    }

    public function AsignarPrecioFinal($precio){ //Para aplicar algun descuento
        $this->precioAsignado = true;
        $this->precioFinal = $precio;
    }

    //**** COMERCIO ****\\

    public function GetURL(){
        if(count($this->carrito)>0)
            return "http://localhost/pasarela/pruebas/form/".$this->web;
        return false;
    }

    public function GetREQUEST(){
        if(count($this->carrito)>0){
            $struct = new Struct($this->web,$this->idPedido,$this->carrito,$this->precioFinal); //Input->AES
            $tokens = $struct->Encode('Request');
            if(!empty($tokens) && count($tokens)==2){
                $this->request = new Request($this->web,$this->idPedido,$tokens['struct'],$tokens['token']);
                return $this->request->ToString();
            } else {
                $this->request = false;
            }
        }
        return false;
    }    

    //**** SERVIDOR ****\\

    public function SetREQUEST($data){ 
        $request = new Request();
        $this->request = $request->Fill($data);
    }

    

    public function ValidateRequest(){

        if($this->request!=NULL && $this->request instanceof Request){
            return $this->request->Validate();
        }
        return false;
    }
    
}


<?php 

namespace App\TPVV;

use App\TPVV\Objects\Item;
use App\TPVV\Objects\Input;
use Illuminate\Support\Facades\Hash;

class Pasarela {
    
    private $web;
    private $idPedido;
    private $carrito;
    private $input;
    private $output;
    private $precioAsignado; //boolean
    private $precioFinal;

    function __construct($w,$idP) {
        $this->web = $w;
        $this->idPedido = $idP;
        $this->carrito = array();
        $this->input = "";
        $this->output = "";
        $this->precioAsignado = false;
        $this->precioFinal = 0;
    }

    public function anadirProducto($nombre,$precio,$cantidad){
        $item = new Item($nombre,$precio,$cantidad);
        array_push($this->carrito,$item);
        if(!$this->precioAsignado)
            $this->precioFinal += $precio*$cantidad;
    }

    public function asignarPrecioFinal($precio){ //Para aplicar algun descuento
        $this->precioAsignado = true;
        $this->precioFinal = $precio;
    }

    public function getINPUT(){
        $this->generateInput();
        return $this->input->toString();
    }

    public function getURL(){
        return "http://localhost/pasarela/pruebas/form/".$this->web;
    }

    private function generateInput(){
        $struct = array(); //Input->AES
        $struct["web"] = $this->web;
        $struct["idPedido"] = $this->idPedido;
        $struct["carrito"] = $this->carrito;
        $struct["precio"] = $this->precioFinal;
        $serialized = serialize($struct);

        $aes = @openssl_encrypt($serialized, "AES-256-CBC", env("TPVV_KEY"));
        $sha = hash("sha256",$serialized);
        
        $entrada = new Input($this->web,$this->idPedido,$aes,$sha);
        $this->input = $entrada;
    }

    public function setInput($data){ //Server
        $struct = @openssl_decrypt($data, "AES-256-CBC", env("TPVV_KEY"));
        $this->input = unserialize($struct);
        dump($this->input);
    }

    public function validateInput(){
        
        if($this->input!=null && $this->input instanceof Input){
            dump($this->input->validate());
        }
    }
    
}

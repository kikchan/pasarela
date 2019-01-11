<?php

namespace App\TPVV\Objects;

class Request {
    public $web;
    public $idPedido;
    public $struct;
    public $tpvv_token;
  
    function __construct($w=NULL,$idP=NULL,$a=NULL,$t=NULL){
        $this->web = $w;
        $this->idPedido = $idP;
        $this->struct = $a;
        $this->tpvv_token = $t;
    }

    public function Fill($text){
        if(isset($text) && $text!=''){
            $struct = @openssl_decrypt($text, "AES-256-CBC", env("TPVV_KEY"));
            $deserialized = unserialize($struct);
            $this->web=$deserialized->web;
            $this->idPedido=$deserialized->idPedido;
            $this->struct=$deserialized->struct;
            $this->tpvv_token=$deserialized->tpvv_token;
            return $this;
        }
        return false;
    }

    public function ToString(){
        $serialized = serialize($this);
        $encryption = @openssl_encrypt($serialized, "AES-256-CBC", env("TPVV_KEY"));
        return $encryption;
    }

    private function Check(){
        $resultado = false;
        if(isset($this->web) && $this->web!='')
            if(isset($this->idPedido) && $this->idPedido!='')
                if(isset($this->struct) && $this->struct!='')
                    if(isset($this->tpvv_token) && $this->tpvv_token!='')
                        $resultado = true;
        return $resultado;
    }

    public function Validate(){ //por completar
        $resultado = false;
        if($this->check()){
            dump(@openssl_decrypt($this->struct, "AES-256-CBC", strrev(env("TPVV_KEY"))));
            $resultado=true;
        }
        
        return $resultado;
    }


}



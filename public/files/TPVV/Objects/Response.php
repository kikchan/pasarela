<?php

namespace App\TPVV\Objects;

class Response {
    public $web;
    public $idPedido;
    public $struct;
    public $tpvv_token;

    function __construct($w=NULL,$idP=NULL,$s=NULL,$t=NULL) {
        $this->web = $w;
        $this->idPedido = $idP;
        $this->struct = $s;
        $this->tpvv_token = $t;
    }

    public function CompleteData($key,$struct){
        $tokens = $struct->Encode('Response',$key);
        $this->struct = $tokens['struct'];
        $this->tpvv_token = $tokens['token'];
    }

    public function ToString($key=NULL){
        $serialized = serialize($this);
        $encryption = @openssl_encrypt($serialized, "AES-256-CBC", $key??env("TPVV_KEY"));
        return $encryption;
    }
    
    public function Fill($key,$text){
        if(isset($text) && $text!=''){
            $struct = @openssl_decrypt($text, "AES-256-CBC", $key);
            $deserialized = unserialize($struct);
            if(isset($deserialized) && $deserialized){
                $this->web=$deserialized->web;
                $this->idPedido=$deserialized->idPedido;
                    $s = new Struct(); $s->Decode($deserialized->struct,$key,'Response');
                $this->struct=$s;
                $this->tpvv_token=$deserialized->tpvv_token;
                return $this;
            }
        }
        return false;
    }


    public function Validate($web=NULL){ //por completar
        $resultado = false;
        if(isset($web)){ //Comprobamos vacios y nulos
            if(isset($this->web) && $this->web!='')
                if(isset($this->idPedido) && $this->idPedido!='')
                    if(isset($this->struct) && $this->struct!='')
                        if(isset($this->tpvv_token) && $this->tpvv_token!=''){
                            $data = $this->struct->DataAndValidate('Response');
                            if(isset($data) && count($data)==4) //Comenzamos las comparaciones
                                if($data['web']==$web && $web==$this->web)
                                    if($data['idPedido']==$this->idPedido)
                                        if(hash("sha256",serialize($data))==$this->tpvv_token)
                                            $resultado = $data;
                        }
        }
        return $resultado;
    }

}

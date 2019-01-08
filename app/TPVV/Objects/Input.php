<?php

namespace App\TPVV\Objects;

class Input {
    public $web;
    public $idPedido;
    public $AES;
    public $tpvv_token;

    function __construct($w,$idP,$a,$t){
        $this->web = $w;
        $this->idPedido = $idP;
        $this->AES = $a;
        $this->tpvv_token = $t;
    }

    public function toString(){
        $serialized = serialize($this);
        $encryption = @openssl_encrypt($serialized, "AES-256-CBC", env("TPVV_KEY"));
        return $encryption;
    }

    private function check(){
        $resultado = false;
        if(isset($this->web) && $this->web!='')
            if(isset($this->idPedido) && $this->idPedido!='')
                if(isset($this->AES) && $this->AES!='')
                    if(isset($this->tpvv_token) && $this->tpvv_token!='')
                        $resultado = true;
        return $resultado;
    }

    public function validate(){
        $resultado = false;
        if($this->check())
            dump(@openssl_decrypt($this->AES, "AES-256-CBC", strrev(env("TPVV_KEY"))));
        
        return $resultado;
    }
}


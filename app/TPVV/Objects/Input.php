<?php

namespace App\TPVV\Objects;

class Input {
    public $web;
    public $idPedido;
    public $AES;
    public $SHA;

    function __construct($w,$idP,$a,$s){
        $this->web = $w;
        $this->idPedido = $idP;
        $this->AES = $a;
        $this->SHA = $s;
    }

    public function toString(){
        $serialized = serialize($this);
        $encryption = @openssl_encrypt($serialized, "AES-256-CBC", env("TPVV_KEY"));
        return $encryption;
    }
}


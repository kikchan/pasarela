<?php

namespace App\TPVV\Objects;

class Struct {
    private $web;
    private $idPedido;
    private $carro;
    private $precio;
    private $estado;
    private $fecha;
    
    function __construct($w=NULL,$ip=NULL,$c=NULL,$p=NULL,$e=NULL,$f=NULL) {
        $this->web = $w;
        $this->idPedido = $ip;
        $this->carro = $c;
        $this->precio = $p;
        $this->estado = $e;
        $this->fecha = $f;
    }

    public function Encode($method=NULL,$key=NULL){
        $s = array();
        if($method=='Request'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['carro'] = $this->carro;
                $temp['precio'] = $this->precio;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev($key??env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }else if ($method=='Response'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['estado'] = $this->estado;
                $temp['fecha'] = $this->fecha;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev($key??env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }
        return $s;
    }

    public function Decode($struct,$key,$method=NULL){
        $s = @openssl_decrypt($struct, "AES-256-CBC", strrev($key));
        $s = unserialize($s);
        if($method=='Request' && $s){
            $this->web = $s['web'];
            $this->idPedido = $s['idPedido'];
            $this->carro = $s['carro'] ;
            $this->precio = $s['precio'];
        }else if ($method=='Response' && $s){
            $this->web = $s['web'];
            $this->idPedido = $s['idPedido'];
            $this->estado = $s['estado'];
            $this->fecha = $s['fecha'];
        }
    }



    public function DataAndValidate($method=NULL){
        $array = array();
        if($method=='Request'){
            if(isset($this->web) && $this->web!='')
                if(isset($this->idPedido) && $this->idPedido!='')
                    if(isset($this->carro) && $this->carro!='')
                        if(isset($this->precio) && $this->precio!='')
                            $array['web'] = $this->web; 
                            $array['idPedido'] = $this->idPedido;
                            $array['carro'] = $this->carro;
                            $array['precio'] = $this->precio;
        }else if ($method=='Response' && $s){

        }
        return $array;
    }



}

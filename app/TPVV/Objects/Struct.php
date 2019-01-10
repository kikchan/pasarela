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

    public function Encode($method=NULL){
        $s = array();
        if($method=='Request'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['carro'] = $this->carro;
                $temp['precio'] = $this->precio;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev(env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }else if ($method=='Response'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['estado'] = $this->estado;
                $temp['fecha'] = $this->fecha;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev(env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }
        return $s;
    }

    public function Decode($request, $method=NULL){
        $s = array();
        if($method=='Request'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['carro'] = $this->carro;
                $temp['precio'] = $this->precio;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev(env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }else if ($method=='Response'){
            $temp = array();
                $temp['web'] = $this->web;
                $temp['idPedido'] = $this->idPedido;
                $temp['estado'] = $this->estado;
                $temp['fecha'] = $this->fecha;
            $serialized = serialize($temp);
            $s['struct'] = @openssl_encrypt($serialized, "AES-256-CBC", strrev(env("TPVV_KEY")));
            $s['token'] =  hash("sha256",$serialized);
        }
        return $s;
    }




}

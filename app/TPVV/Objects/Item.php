<?php

namespace App\TPVV\Objects;

class Item {
    public $nombre;
    public $cantidad;
    public $precio;

    function __construct($n, $c, $p) {
        $this->nombre = $n;
        $this->cantidad = $c;
        $this->precio = $p;        
    }
}

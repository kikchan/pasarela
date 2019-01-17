<?php

namespace App\TPVV\Objects;

class Item {
    public $nombre;
    public $cantidad;

    function __construct($n, $c) {
        $this->nombre = $n;
        $this->cantidad = $c;   
    }
}


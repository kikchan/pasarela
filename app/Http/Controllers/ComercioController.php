<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\TPVV\Pasarela;


class ComercioController extends Controller
{
    public function vista(){
        return view('menuComercio');
    }

    public function pedidos(){
        return view('pedidos');
    }
}

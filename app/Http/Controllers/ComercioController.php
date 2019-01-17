<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ComercioController extends Controller
{
    public function vista(){
        //return view('menuComercio');
        return view('menuTecnico');
        
    }

    public function general($idComercio) {
        return view('generalComercio');
    }
}

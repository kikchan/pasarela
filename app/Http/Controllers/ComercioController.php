<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ComercioController extends Controller
{
    public function vista(){
        return view('menuComercio');
    }

    public function general($idComercio) {
        return view('generalComercio');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ValoracionesController extends Controller
{
     public function vista(){

     	$listaValoraciones = DB::table('pasarelabd.valoraciones')->get();
        return view('menuComercioValoraciones')->with('listaValoraciones', $listaValoraciones);
    }
}

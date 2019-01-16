<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Valoracion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ValoracionesController extends Controller
{
     public function vista(){

     	$listaValoraciones = Valoracion::all();
     	$listaUsuarios = User::all();
		
        return view('menuComercioValoraciones')->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios);
    }
}

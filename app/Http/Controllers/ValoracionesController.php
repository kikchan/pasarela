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
		
        return view('menuAdministradorValoraciones')->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios);
    }

    public function delete(){
    	$user = User::find(Request::input('id'));
     	$listaValoraciones = Valoracion::all();
     	$listaUsuarios = User::all();
        return Redirect::to('/valoraciones');
    }



    
}

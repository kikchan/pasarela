<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Valoracion;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Redirect;


class ValoracionesController extends Controller
{
     public function vistaAdministrador(){

     	$listaValoraciones = Valoracion::all();
     	$listaUsuarios = User::all();
		
        return view('menuComercioValoraciones')->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios);
    }

    public function vistaTecnico(){
    	//sustituir por id usuario
     	//$listaValoraciones = Valoracion::where("id","=",4)->get()->toArray();
     	//$listaValoraciones = Valoracion::all();
    	$listaValoraciones = Valoracion::where('id', '=', 4)->get();
     	$listaUsuarios = User::all();

        return view('menuTecnicoValoraciones')->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios);
    }
    public function delete(Request $request){

    	$idEliminar = $request->input('id');
    	$valoracion = Valoracion::where('id', '=', $idEliminar);
		$valoracion->delete();

        return Redirect::to('valoraciones');
    }



    
}

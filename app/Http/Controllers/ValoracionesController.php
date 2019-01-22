<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Valoracion;
use App\User;
use App\Ticket;
use App\Estado;
use Illuminate\Database\Eloquent\Model;
use Redirect;


class ValoracionesController extends Controller
{
     public function vistaAdministrador(){

     	$listaValoraciones = Valoracion::all();
     	$usuarios = User::all();
		
        return view('admin/valoraciones', compact('listaValoraciones'))->with('listaValoraciones', $listaValoraciones)->with('usuarios', $usuarios);
    }


    public function create(Request $request){
    	
		$estrellas = $request->input('estrellas');
		$idTecnico = $request->input('idTecnico');
		$comentario = $request->input('comentario');
		$valoracion = new Valoracion();
 
		$valoracion->valoracion = $estrellas;
		$valoracion->comentario = $comentario;
		$valoracion->idTecnico = $idTecnico;
		$valoracion->idComercio = 2;
		$valoracion->save();
        return Redirect::to('valoracionesComercio');
    }
   

    public function vistaCrearValoracion(Request $request){
		$idTecnico = $request->input('idTecnico');
		$nombreTecnico = $request->input('nombreTecnico');
        return view('crearValoracion')->with('idTecnico', $idTecnico)->with('nombreTecnico', $nombreTecnico);
    }
   
    public function vistaComercio(){
    	//cambiar id usuario
     	$listaTickets = Ticket::where('idComercio', '=', 2)->get();
     	$listaUsuarios = User::all();
     	$estados = Estado::all();

     	//cambiar id usuario
		$valoraciones = Valoracion::where('idComercio', '=', 2)->get();
        return view('menuComercioValoraciones')->with('listaTickets', $listaTickets)->with('usuarios', $listaUsuarios)->with('estados', $estados)->with('valoraciones', $valoraciones);
    }


    public function vistaTecnico(){
    	//sustituir por id usuario
    	$listaUsuarios = User::where('id', '=', 3)->get();
       	$listaValoraciones = Valoracion::all();
        return view('menuTecnicoValoraciones')->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios);
    }
    public function delete(Request $request){

    	$idEliminar = $request->input('id');
    	$valoracion = Valoracion::where('id', '=', $idEliminar);
		$valoracion->delete();

        return Redirect::to('valoracionesAdministrador');
    }



    
}

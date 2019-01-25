<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ticket;
use App\User;
use App\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ValoracionesController extends Controller
{
    public function vistaAdministrador()
    {

        $listaValoraciones = Valoracion::paginate(4);
        $usuarios = User::all();

        return view('admin/valoraciones', compact('listaValoraciones'))->with('listaValoraciones', $listaValoraciones)->with('usuarios', $usuarios);
    }

    public function create(Request $request)
    {

        $estrellas = $request->input('estrellas');
        $idTecnico = $request->input('idTecnico');
        $comentario = $request->input('comentario');
        $valoracion = new Valoracion();

        $valoracion->valoracion = $estrellas;
        $valoracion->comentario = $comentario;
        $valoracion->idTecnico = $idTecnico;
        $valoracion->idComercio = Auth::user()->id;
        $valoracion->save();
        return Redirect::to('/comercio-soporte/valoracionesComercio');
    }

    public function vistaCrearValoracion(Request $request)
    {
        $idTecnico = $request->input('idTecnico');
        $nombreTecnico = $request->input('nombreTecnico');
        $idUsuario = Auth::user()->id;
        return view('comercio/crearValoracion')->with('idTecnico', $idTecnico)->with('nombreTecnico', $nombreTecnico)->with('idUsuario', $idUsuario);
    }

    public function vistaComercio()
    {
        //cambiar id usuario
        $idUsuario = Auth::user()->id;
        //$listaTickets = Ticket::where('idComercio', '=', $idUsuario)->get();
        $listaTickets = Ticket::paginate(6);
        $listaUsuarios = User::all();
        $estados = Estado::all();
        $idUsuario = Auth::user()->id;
        //cambiar id usuario
        $valoraciones = Valoracion::where('idComercio', '=', $idUsuario)->get();
        return view('comercio/menuComercioValoraciones')->with('listaTickets', $listaTickets)->with('idUsuario', $idUsuario)->with('usuarios', $listaUsuarios)->with('estados', $estados)->with('valoraciones', $valoraciones);
    }

    public function vistaTecnico()
    {
        //sustituir por id usuario
        $idUsuario = Auth::user()->id;
        $listaUsuarios = User::where('id', '=', $idUsuario)->get();
        $comercios = User::where('esComercio', '=', 1)->get();
        $listaValoraciones = Valoracion::paginate(6);
        return view('tecnico/menuTecnicoValoraciones')->with('comercios', $comercios)->with('listaValoraciones', $listaValoraciones)->with('usuarios', $listaUsuarios)->with('idUsuario', $idUsuario);
		}
		
    public function delete(Request $request)
    {

        $idEliminar = $request->input('id');
        $valoracion = Valoracion::where('id', '=', $idEliminar);
        $valoracion->delete();

        return Redirect::to('administrador/valoracionesAdministrador');
    }
}

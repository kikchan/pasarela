<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\TPVV\Pasarela;
use App\Transacciones;

class TransaccionesController extends Controller
{

    public function pagos($idComercio){
        $pagos = Transacciones::where('idComercio',$idComercio)->get();
        return view('listaTransacciones', ['pagos' => $pagos]);
    }

    public function filtrarEstado() {

    }
}

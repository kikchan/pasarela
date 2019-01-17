<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComercioController extends Controller
{
    public function vista(){
        return view('menuComercio');
    }

    public function general($idComercio) {
        $transaccionesDia = array();
        for($i=0; $i<30; $i++) {
            $numPagos = DB::table('transacciones')->where('idComercio', $idComercio)->whereDate('created_at', '=', date('2019-01-'.$i))->count();
            $transaccionesDia[] = (string)$numPagos;
        }
        return view('generalComercio', ['numPagos'=>$transaccionesDia]);
    }
}

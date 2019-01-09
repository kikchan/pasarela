<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\TPVV\Pasarela;
use App\Transacciones;

class TransaccionesController extends Controller
{

    public function pagos($idComercio){
        $pagos = Transacciones::where('idComercio',$idComercio)->get();
        return view('listaTransacciones', ['pagos' => $pagos]);
    }

    public function filtrarEstado(Request $request) {
        $estado = $request->input('estado');
        $importe = $request->input('importe');

        if($estado != "0") {
            $transacciones = DB::table('transacciones')->where('idEstado',$estado)->paginate(5);
            if($importe == "1") {
                $transacciones = Transacciones::where('importe', '<=', 50.0)->paginate(5);
            }
            elseif($importe == "2") {
                $transacciones = Transacciones::whereBetween('importe', [50.0, 100.0])->paginate(5);
            }
            elseif($importe == "3") {
                $transacciones = Transacciones::whereBetween('importe', [100.0, 500.0])->paginate(5);
            }
            elseif($importe == "4") {
                $transacciones = Transacciones::where('importe', '>=', 500.0)->paginate(5);
            }
        }
        elseif($estado == "0" && $importe != "0") {
            $transacciones = DB::table('transacciones')->paginate(5);

            if($importe == "1") {
                $transacciones = Transacciones::where('importe', '<=', 50.0)->paginate(5);
            }
            elseif($importe == "2") {
                $transacciones = Transacciones::whereBetween('importe', [50.0, 100.0])->paginate(5);
            }
            elseif($importe == "3") {
                $transacciones = Transacciones::whereBetween('importe', [100.0, 500.0])->paginate(5);
            }
            elseif($importe == "4") {
                $transacciones = Transacciones::where('importe', '>=', 500.0)->paginate(5);
            }
        }
        return view('listaTransacciones', ['pagos' => $transacciones]);
    }
}
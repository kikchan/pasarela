<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Transaccion;
use App\Valoracion;
use App\User;
use App\Tarjeta;
use Carbon\Carbon;

class TransaccionesController extends Controller
{

    public function pagos($idComercio){
        $transacciones = Transaccion::where('idComercio',$idComercio)->get();
       for($i=0; $i<$transacciones->count(); $i++)
        {
            if($transacciones->get($i)->idTarjeta != null)
            {
                $id = $transacciones->get($i)->idTarjeta;
                $tarjeta = Tarjeta::FindOrFail($id);
                $transacciones->get($i)->idTarjeta = substr($tarjeta->numero,12,16);
            }
        }
        return view('listaTransacciones', ['pagos' => $transacciones, 'idUsuario'=>$idComercio]);
    }

    public function filtrar(Request $request, $idComercio) {
        $estado = $request->input('estado');
        $importe = $request->input('importe');

        if($estado != "0") {
            $transacciones = DB::table('transacciones')->where('idComercio', $idComercio)->where('idEstado', $estado)->paginate(5);
            if($importe == "1") {
                $transacciones = Transaccion::where('idComercio', $idComercio)->where('idEstado', $estado)->where('importe', '<=', 50.0)->paginate(5);
            }
            elseif($importe == "2") {
                $transacciones = Transaccion::where('idComercio', $idComercio)->where('idEstado', $estado)->whereBetween('importe', [50.0, 100.0])->paginate(5);
            }
            elseif($importe == "3") {
                $transacciones = Transaccion::where('idComercio', $idComercio)->where('idEstado', $estado)->whereBetween('importe', [100.0, 500.0])->paginate(5);
            }
            elseif($importe == "4") {
                $transacciones = Transaccion::where('idComercio', $idComercio)->where('idEstado', $estado)->where('importe', '>=', 500.0)->paginate(5);
            }
        }
        elseif($estado == "0") {
            $transacciones = DB::table('transacciones')->where('idComercio', $idComercio)->paginate(5);
            if($importe == "1") {
                $transacciones = Transaccion::where('importe', '<=', 50.0)->paginate(5);
            }
            elseif($importe == "2") {
                $transacciones = Transaccion::whereBetween('importe', [50.0, 100.0])->paginate(5);
            }
            elseif($importe == "3") {
                $transacciones = Transaccion::whereBetween('importe', [100.0, 500.0])->paginate(5);
            }
            elseif($importe == "4") {
                $transacciones = Transaccion::where('importe', '>=', 500.0)->paginate(5);
            }
        }
        return view('listaTransacciones', ['pagos' => $transacciones, 'idUsuario'=>$idComercio]);
    }

    public function buscarId(Request $request, $idComercio) {
        $idTransaccion = $request->input('idTransaccion');
        if($idTransaccion == null)
        {
            $transaccion = Transaccion::where('idComercio',$idComercio)->get();
        } else {
            $transaccion = DB::table('transacciones')->where('idComercio',$idComercio)->where('id', $idTransaccion)->get();
        }
        return view('listaTransacciones', ['pagos' => $transaccion, 'idUsuario'=>$idComercio]);
    }

    public function general($idComercio) {
        $pagos = DB::table('transacciones')->where('idComercio', $idComercio)->count();
        $ingresos = DB::table('transacciones')->where('idComercio', $idComercio)->sum('importe');
        $totalTrans = DB::table('transacciones')->where('idComercio', $idComercio)->whereDate('created_at', '<=', date('2018-12-31'))
            ->whereDate('created_at', '>=', date('2018-12-01'))->count();
        $totalTickets = DB::table('tickets')->where('idComercio', $idComercio)->count();

        // Numero total de transacciones en un mes en específico
        $transaccionesDia = array();
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');
        $dias = $end->diffInDays($start);
        for($i=0; $i<=$dias; $i++) {
            $numPagos = DB::table('transacciones')->where('idComercio', $idComercio)->whereDate('created_at', '=', date($start->format('Y-m').'-'.$i))->count();
            $transaccionesDia[] = (string)$numPagos;
        }
        // Numero de trasacciones y tichets generado, en espera, aceptado y rechazado
        $transaccionesPorEstado = array();
        $ticketsPorEstado = array();
        for($i=0; $i<4; $i++) {    
            $transaccionesPorEstado[] = DB::table('transacciones')->where('idComercio', $idComercio)->where('idEstado', $i+1)
                ->whereDate('created_at', '<=', date($end->format('Y-m-d')))->whereDate('created_at', '>=', date($start->format('Y-m-d')))->count();
            $ticketsPorEstado[] = DB::table('tickets')->where('idComercio', $idComercio)->where('idEstado', $i+1)->count();
        }
        return view('generalComercio', ['numPagos'=>$transaccionesDia, 'totalTrans'=>$totalTrans, 'totalTickets'=>$totalTickets,'transacciones'=>$transaccionesPorEstado,
                'tickets'=>$ticketsPorEstado,'pagos'=>$pagos, 'ingresos'=>$ingresos, 'idUsuario'=>$idComercio]);
    }

    public function tecnicoMejorValorado() {
        // Obtenemos el tecnico con la media de sus valoraciones mas alta
        $valoraciones=0;
        $tecnicos = User::where('esTecnico', 1)->get();
        foreach($tecnicos as $tecnico) {
            if($tecnico->valoraciones->avg('valoracion') > $valoraciones) {
                $valoraciones = $tecnico->valoraciones->avg('valoracion');
                $topTecnico = $tecnico;
            }
        }

        return $topTecnico;
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;
use App\User;

class PasarelaController extends Controller
{

    public function pagar(){
        return view('pago/pagar');
    }

    public function gen(){
        return view('pago/generate');
    }

    public function pgen(Request $request){
        $web = $request->input('web');
        $idPedido = $request->input('idPedido');
        $key = $request->input('key');
        $carrito = $request->input('lista');
        $precio = $request->input('precio');
        
        $tpvv = new Pasarela($web,(int)$idPedido,$key);
        $items = explode('|',$carrito);
        foreach($items as $item){
            $data = explode(',',$item);
            if(count($data)==3)
                $tpvv->AnadirProducto((int)$data[0],(int)$data[1],(int)$data[2]);
        }
        if(isset($precio))
            $tpvv->AsignarPrecioFinal((int)$precio);

        return view('pago/form',['request'=>$tpvv->getREQUEST(),'url'=>$tpvv->getURL()]);

    }

    public function gform(){ //Comercio envia la solicitud
        
        $tpvv = new Pasarela('Fran',1);
        
        $tpvv->AnadirProducto(1,1,1);
        $tpvv->AnadirProducto(2,2,2);
        $tpvv->AnadirProducto(3,3,3);
        $tpvv->AsignarPrecioFinal(1);
        //dump($tpvv);
        return view('pago/form',['request'=>$tpvv->getREQUEST(),'url'=>$tpvv->getURL()]);
    }

    public function pform($web,Request $request){ //Nuestro servidor recibe la solicitud
        $tpvv = new Pasarela($web,NULL);
        $texto = $request->input('tpvv_request');
        //dump($texto);
        
        $tpvv->SetREQUEST($texto);
        $sha = $tpvv->CreateTransaction();
        return redirect()->action('TicketController@detalles', ['id' => $sha]);

    }
}



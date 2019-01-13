<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;
use App\User;

class PasarelaController extends Controller
{
    public function pruebas(){
        $tpvv = new Pasarela(env("APP_NAME","Error"),1);
        
        $tpvv->AnadirProducto(1,1,1);
        $tpvv->AnadirProducto(2,2,2);
        $tpvv->AnadirProducto(3,3,3);
        $tpvv->AsignarPrecioFinal(1);
        $tpvv->GetURL();        
    }

    public function gform(){ //Comercio envia la solicitud
        
        $tpvv = new Pasarela('Fran',1);
        
        $tpvv->AnadirProducto(1,1,1);
        $tpvv->AnadirProducto(2,2,2);
        $tpvv->AnadirProducto(3,3,3);
        $tpvv->AsignarPrecioFinal(1);
        
        return view('pago/form',['request'=>$tpvv->getREQUEST(),'url'=>$tpvv->getURL()]);
    }

    public function pform($web,Request $request){ //Nuestro servidor recibe la solicitud
        $tpvv = new Pasarela($web,NULL);
        $texto = $request->input('tpvv_request');
        dump($texto);
        
        $tpvv->SetREQUEST($texto);
        var_dump($tpvv->ValidateRequest());
        
    }
}

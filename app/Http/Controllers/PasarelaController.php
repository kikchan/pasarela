<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;

class PasarelaController extends Controller
{
    public function pruebas(){
        $tpvv = new Pasarela(env("APP_NAME","Error"),1);
        
        $tpvv->AnadirProducto(1,1,1);
        $tpvv->AnadirProducto(2,2,2);
        $tpvv->AnadirProducto(3,3,3);
        $tpvv->AsignarPrecioFinal(1);
        $tpvv->GenerateURL();        
    }

    public function gform(){
        
        $tpvv = new Pasarela(env("APP_NAME","Error"),1);
        
        $tpvv->AnadirProducto(1,1,1);
        $tpvv->AnadirProducto(2,2,2);
        $tpvv->AnadirProducto(3,3,3);
        $tpvv->AsignarPrecioFinal(1);
        
        return view('pago/form',['request'=>$tpvv->getREQUEST(),'url'=>$tpvv->getURL()]);
    }

    public function pform(Request $request){
        
      
        $texto = $request->input('prueba');
        dump($texto);
        $tpvv = new Pasarela(env("APP_NAME","Error"),1);
        $tpvv->SetREQUEST($texto);
        $tpvv->ValidateRequest();
        
    }
}

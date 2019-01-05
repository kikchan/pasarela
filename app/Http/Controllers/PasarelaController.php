<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TPVV\Pasarela;


class PasarelaController extends Controller
{
    public function pruebas(){
        $tpvv = new Pasarela(env("APP_NAME","Error"),1);
        
        $tpvv->anadirProducto(1,1,1);
        $tpvv->anadirProducto(2,2,2);
        $tpvv->anadirProducto(3,3,3);
        $tpvv->asignarPrecioFinal(1);
        
        $tpvv->generateURL();
        
    }
}

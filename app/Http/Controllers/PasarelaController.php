<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;
use App\TPVV\Objects\Item;
use App\User;
use App\Transaccion;

class PasarelaController extends Controller
{

    public function pagar($id){
        $model = Transaccion::where('sha',$id)->get();
        $lista = array();
        if(count($model)==0) {
            $result = 'error';
        }elseif(count($model)==1) {
            $result = $model[0];
            $serial = @openssl_decrypt($result->carro, "AES-256-CBC", $result->_idComercio->key);
            $lista = unserialize($serial);
    }
    
        return view('pago/pagar',['registro'=>$result,'lista'=>$lista]);
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
            if(count($data)==2)
                $tpvv->AnadirProducto((int)$data[0],(int)$data[1]);
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
                
        $tpvv->SetREQUEST($texto);
        $sha = $tpvv->CreateTransaction();

        return redirect()->action('PasarelaController@pagar', ['id' => $sha]);

    }
}



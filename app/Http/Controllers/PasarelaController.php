<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;
use App\TPVV\Objects\Item;
use App\ServiceLayer\CreditCardService;
use App\User;
use App\Transaccion;
use App\Tarjeta;
use Auth;

class PasarelaController extends Controller
{
    public function pruebas(){
        
    }

    public function devolucion($idU,$idP){ //middleware comercio
        $pedido = Transaccion::Find($idP);
        if(isset($pedido)){
            if($pedido->idEstado==3 && count(Transaccion::where('sha','devolucion.'.$pedido->sha)->get())==0){
                $t = new Transaccion();
                $t->idComercio = $pedido->idComercio;
                $t->pedido = $pedido->pedido;
                $t->sha = 'devolucion.'.$pedido->sha;
                $t->carro = $pedido->carro;
                $t->importe = $pedido->importe*(-1);
                $t->idTarjeta = $pedido->idTarjeta;
                $t->idTarjeta = $pedido->idTarjeta;
                $t->idEstado = 5;
                $t->comentario = 'Devolucion pedido '.$pedido->id;
                $pedido->idEstado = 5;
                $pedido->comentario = 'Devolucion';
                $t->save();
                $pedido->save();
                //Generar la peticion
                $user = $pedido->_idComercio;
                $tpvv = new Pasarela($user->nick,$pedido->pedido,$user->key);
                $tpvv->AsignTransaction($pedido);
                return view('pago/devolucion',['registro'=>$pedido,'url'=>$user->endpoint,'response'=>$tpvv->GetRESPONSE(),'idUsuario'=>$idU]);
            }
        }
        return view('pago/devolucion',['registro'=>NULL,'url'=>NULL,'response'=>NULL,'idUsuario'=>Auth::User()->id]);
    }

    public function endpoint(Request $response){
        
        $tpvv = new Pasarela('Mastodonte',NULL,'mastodonte'); //web, idPedido, clave
        $tpvv->SetRESPONSE($response); 
        $datos = $tpvv->ValidateResponse(); //Se obtiene un array 
        dump($datos);
    }

    public function check($sha,Request $request){

        $name = $request->input('name');
        $number = str_replace(' ','',$request->input('number'));
        $expiry = str_replace(' ','',$request->input('expiry')); //12/5262
        $cvv = $request->input('cvc'); 

        if(strlen($name)>3 && strlen($number)>=10 && strlen($number)<20 && strlen($expiry)==7 && strlen($cvv)>2 && strlen($cvv)<5){
            $transacciones = Transaccion::where('sha',$sha)->get();
            if(count($transacciones)==1 && $transacciones[0]->idEstado==1){
                $array = CreditCardService::Simulate($number,$name,$expiry,$cvv);
                $tarjetas = Tarjeta::where('numero',$number)->get();
                if(count($tarjetas)==0){
                    $t = new Tarjeta();
                    $t->numero = $number;
                    $t->caducidad = $expiry;
                    $t->cvv = $cvv;
                    $t->save();
                    $transacciones[0]->idTarjeta = $t->id;
                    $transacciones[0]->save();
                }else {
                    $transacciones[0]->idTarjeta = $tarjetas[0]->id;
                }
                $transacciones[0]->idEstado = $array[0];
                $transacciones[0]->comentario = $array[1];
                $transacciones[0]->save();
                $user = $transacciones[0]->_idComercio;
                $tpvv = new Pasarela($user->nick,$transacciones[0]->pedido,$user->key);
                $tpvv->AsignTransaction($transacciones[0]);
                return view('pago/status',['registro'=>$transacciones[0],'url'=>$user->endpoint,'response'=>$tpvv->GetRESPONSE()]);
            }
            else if(count($transacciones)==1 && $transacciones[0]->idEstado>=3){
                return view('pago/status',['registro'=>$transacciones[0],'url'=>NULL,'response'=>NULL]);
            }
            return view('pago/status',['registro'=>NULL,'url'=>NULL,'response'=>NULL]);
        }else {
            return view('pago/status',['registro'=>NULL,'url'=>NULL,'response'=>NULL]);
        }        
        
        
    }

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
        $precio = str_replace(',','.',$request->input('precio'));
        
        dump($precio);
        $tpvv = new Pasarela($web,(int)$idPedido,$key);
        $items = explode('|',$carrito);
        foreach($items as $item){
            $data = explode(',',$item);
            if(count($data)==2)
                $tpvv->AnadirProducto($data[0],(int)$data[1]);
        }
        if(isset($precio))
            $tpvv->AsignarPrecioFinal((real)$precio);

        return view('pago/form',['request'=>$tpvv->getREQUEST(),'url'=>$tpvv->getURL()]);

    }

    public function gform(){ //Comercio envia la solicitud
        
        $tpvv = new Pasarela('Fran',1); //web, idpedido
        
        $tpvv->AnadirProducto('smartphone',1); //producto,cantidad
        $tpvv->AnadirProducto('bateria_externa',1); //producto,cantidad
        $tpvv->AnadirProducto('funda',1); //producto,cantidad
        $tpvv->AsignarPrecioFinal(267.38); //precio
        
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



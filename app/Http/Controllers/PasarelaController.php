<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TPVV\Pasarela;
use App\TPVV\Objects\Item;
use App\ServiceLayer\CreditCardService;
use App\User;
use App\Transaccion;
use App\Tarjeta;

class PasarelaController extends Controller
{
    public function pruebas(){
        var_dump(CreditCardService::Simulate('460000000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('461900000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('51200000000000','2','12/2030','4'));
        var_dump(CreditCardService::Simulate('51390000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('46400000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('46590000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('51600000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('46790000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('518090000000000','2','12/2020','4'));
        var_dump(CreditCardService::Simulate('51990000000000','2','12/2020','4'));
        
        
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

        if(strlen($name)>3 && strlen($number)>10 && strlen($expiry)==7 && strlen($cvv)>2 && strlen($cvv)<5){

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



<?php
namespace App\ServiceLayer;

use Illuminate\Support\Facades\DB;


class CreditCardService{
     
    public static function Simulate($num,$name,$exp,$cvv){
        echo '<br>';
        echo $num.' | '.$name.' | '.$exp.' | '.$cvv;
        $estado = 0;
        $mensaje = '';

        if(preg_match("/^45/", $num) || preg_match("/^50/", $num)){
            $estado = 3;
            $mensaje = 'Correcto';
        }else if(preg_match("/^46/", $num) || preg_match("/^51/", $num)){

            //analizamos fecha primero
            $fecha = explode('/',$exp);
            if(count($fecha)==2){
                $mes = $fecha[0];
                $anyo = $fecha[1];

                if($anyo > 2030 || $mes>12 || $mes<1){
                    $estado = 4;
                    $mensaje= 'Caducidad de la tarjeta de credito FALSA';
                }
                else if($anyo>date('Y') || $anyo==date('Y')){
                    //NADA   
                }else {
                    $estado = 4;
                    $mensaje = 'Caducidad de la tarjeta de credito FALSA';
                }
            }else {
                $estado = 4;
                $mensaje = 'Caducidad de la tarjeta de credito FALSA';
            }
    
            if($estado===0){
                $estado = 4;
                if(preg_match("/^..0/", $num) || preg_match("/^..1/", $num))
                    $mensaje = 'Tarjeta de credito desactivada';
                else if(preg_match("/^..2/", $num) || preg_match("/^..3/", $num))
                    $mensaje = 'Error autenticacion titular';
                else if(preg_match("/^..4/", $num) || preg_match("/^..5/", $num))
                    $mensaje = 'Intentos PIN excedidos.';
                else if(preg_match("/^..6/", $num) || preg_match("/^..7/", $num))
                    $mensaje = 'CVV incorrecto';
                else if(preg_match("/^..8/", $num) || preg_match("/^..9/", $num))
                    $mensaje = 'Error de sistema';
            }

        } else{
            $estado = 3;
            $mensaje = 'Correcto';
        }        
        
        return array($estado,$mensaje);

    }

}

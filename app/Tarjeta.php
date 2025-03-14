<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjetas';

    protected $fillable = [
        'id', 'numero', 'caducidad', 'cvv'
    ];

    public $timestamps = false;
    // Relación 1-N con Transaccion
    public function transacciones()
    {
        return $this->hasMany('App\Transaccion', 'idTarjeta');
    }
}

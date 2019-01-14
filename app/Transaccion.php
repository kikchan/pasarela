<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';

    protected $fillable = [
        'id', 'idComercio', 'importe', 'idTarjeta', 'idEstado', 'comentario'
    ];

    // Relación 1-N con Ticket
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'idTransaccion');
    }
    
    // Relación N-1 con Usuario (Comercio)
    public function _idComercio()
    {
        return $this->belongsTo('App\User', 'idComercio');
    }

    // Relación N-1 con Estado
    public function _idEstado()
    {
        return $this->belongsTo('App\Estado', 'idEstado');
    }

    // Relación N-1 con Tarjeta
    public function _idTarjeta()
    {
        return $this->belongsTo('App\Tarjeta', 'idTarjeta');
    }
}

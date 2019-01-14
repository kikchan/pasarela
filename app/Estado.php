<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = [
        'id', 'descripcion'
    ];

    // Relación 1-N con Ticket
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'idEstado');
    }

    // Relación 1-N con Transaccion
    public function transacciones()
    {
        return $this->hasMany('App\Transaccion', 'idEstado');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'valoraciones';

    protected $fillable = [
        'id', 'idComercio', 'idTecnico', 'valoracion', 'comentario'
    ];

    // Relación N-1 con Valoracion
    public function _idComercio()
    {
        return $this->belongsTo('App\User', 'idComercio');
    }

    // Relación N-1 con Valoracion
    public function _idTecnico()
    {
        return $this->belongsTo('App\User', 'idTecnico');
    }
}

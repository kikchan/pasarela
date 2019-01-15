<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'id', 'idUsuario', 'idTicket', 'comentario', 'adjunto'
    ];

    // Relación N-1 con Usuario | Puede ser el técnico o el comercio
    public function _idUsuario()
    {
        return $this->belongsTo('App\User','idUsuario');
    }

    // Relación N-1 con Ticket
    public function _idTicket()
	{
		return $this->belongsTo('App\Ticket', 'idTicket');
    }
}

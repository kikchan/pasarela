<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'id', 'idComercio', 'idTecnico', 'idTransaccion', 'asunto', 'idEstado'
    ];

    // Relación N-1 con Usuario (Comercio)
    public function _idComercio()
	{
		return $this->belongsTo('App\User', 'idComercio');
    }
    
    // Relación N-1 con Usuario (Técnico)
    public function _idTecnico()
	{
		return $this->belongsTo('App\User', 'idTecnico');
    }
    
    // Relación N-1 con Transaccion
    public function _idTransaccion()
	{
		return $this->belongsTo('App\Transaccion', 'idTransaccion');
    }
    
    // Relación N-1 con Estado
    public function _idEstado()
	{
		return $this->belongsTo('App\Estado', 'idEstado');
    }
    
    // Relacion 1-N con Mensaje
    public function mensajes()
    {
        return $this->hasMany('App\Mensaje','idTicket');
    }

    // Buscador
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("id", "LIKE","%$keyword%")
                    ->orWhere("asunto", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}

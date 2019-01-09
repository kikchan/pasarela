<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table="estados";
    public $primaryKey="id";
    public $incrementing=true;
    public $timestamps=false;

    public function transacciones() {
        return $this->belongsTo('App\Transacciones', 'idEstado');
    }
}
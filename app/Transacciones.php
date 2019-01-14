<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{
    protected $table="transacciones";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;

    public function estado() {
        return $this->hasOne('App\Estado');
    }
}
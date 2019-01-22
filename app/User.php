<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id', 'nombre', 'apellidos', 'nick', 'email', 'password', 'key', 'esComercio', 'esAdministrador', 'esTecnico', 'endpoint',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // Relación 1-N con Ticket (Solo comercios)
    public function tickets_comercio()
	{
		return $this->hasMany('App\Ticket', 'idComercio');
    }

    // Relación 1-N con Ticket (Solo técnicos)
    public function tickets_tecnico()
	{
		return $this->hasMany('App\Ticket', 'idTecnico');
    }

    // Relación 1-N con Transaccion (Solo comercios)
    public function transacciones()
	{
		return $this->hasMany('App\Transaccion', 'idComercio');
    }

    // Relación 1-N con Valoracion (Solo técnicos)
    public function valoraciones()
    {
        return $this->hasMany('App\Valoracion', 'idTecnico');
    }
}
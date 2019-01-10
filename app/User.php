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
        'id', 'nombre', 'apellidos', 'nick', 'email', 'password', 'key', 'esComercio', 'esAdministrador', 'esTecnico'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // Relación 1-N con Ticket
    public function tickets()
	{
		return $this->hasMany('App\Ticket');
    }

    // Relación 1-N con Transaccion (Solo comercio)
    public function transacciones()
	{
		return $this->hasMany('App\Transaccion');
    }

    // Relación 1-N con Valoracion (Solo técnicos)
    public function valoraciones()
    {
        return $this->hasMany('App\Valoracion');
    }
}
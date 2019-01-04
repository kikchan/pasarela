<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idUsuario'); //Puede ser el tecnico o el comercio
            //La idea es que obtenemos el idTecnico y comparamos con el idUsuario del mensaje, si es igual a la izquierda y si no a la derecha
            $table->unsignedInteger('idTicket');
            $table->string('comentario');
            $table->string('adjunto'); //Es posible que sea necesario adjuntar ficheros (imagenes o pdfs)
            $table->timestamps();

            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idTicket')->references('id')->on('tickets');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}


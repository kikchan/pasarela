<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idComercio');
            $table->unsignedInteger('pedido');
            $table->string('sha');
            $table->longText('carro');
            $table->decimal('importe',10, 2);
            $table->unsignedInteger('idTarjeta')->nullable();
            $table->unsignedInteger('idEstado')->nullable();
            $table->string('comentario')->nullable(); //Enlazado al estado
            $table->timestamps();

            $table->foreign('idComercio')->references('id')->on('users');
            $table->foreign('idTarjeta')->references('id')->on('tarjetas');
            $table->foreign('idEstado')->references('id')->on('estados');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoraciones');
        Schema::dropIfExists('mensajes');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('transacciones');
        Schema::dropIfExists('tarjetas');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('users');
    }
}

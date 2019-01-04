<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idComercio');
            $table->unsignedInteger('idTecnico');
            $table->unsignedInteger('idTransaccion')->nullable();
            $table->string('asunto');
            $table->unsignedInteger('idEstado');
            $table->timestamps();

            $table->foreign('idComercio')->references('id')->on('users');
            $table->foreign('idTecnico')->references('id')->on('users');
            $table->foreign('idTransaccion')->references('id')->on('transacciones');
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

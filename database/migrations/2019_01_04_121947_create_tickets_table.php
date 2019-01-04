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
            $table->string('asunto');
            $table->unsignedInteger('idEstado');
            $table->timestamps();

            $table->foreign('idComercio')->references('id')->on('users');
            $table->foreign('idTecnico')->references('id')->on('users');
            $table->foreign('idEstado')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

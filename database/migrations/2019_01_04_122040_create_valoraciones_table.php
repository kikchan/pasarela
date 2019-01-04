<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idComercio');
            $table->unsignedInteger('idTecnico');
            $table->integer('valoracion');
            $table->string('comentario');
            $table->timestamps();

            $table->foreign('idComercio')->references('id')->on('users');
            $table->foreign('idTecnico')->references('id')->on('users');

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
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',19);
            $table->char('caducidad',7);
            $table->char('cvv',4);
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

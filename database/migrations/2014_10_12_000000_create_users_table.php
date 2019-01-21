<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			$table->string('apellidos');
			$table->string('nick')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //Yo lo quitaria
            $table->string('password');
            $table->string('key'); //necesario para la seguridad
            $table->string('endpoint'); //necesario para la seguridad
            $table->rememberToken();
			$table->boolean('esComercio')->default('1');
			$table->boolean('esAdministrador')->default('0');
			$table->boolean('esTecnico')->default('0');
            $table->timestamps();
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

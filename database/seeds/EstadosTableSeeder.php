<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();
        DB::table('estados')->insert([
            'descripcion' => 'generado'
        ]);
        DB::table('estados')->insert([
            'descripcion' => 'espera'
        ]);
        DB::table('estados')->insert([
            'descripcion' => 'aceptado'
        ]);
        DB::table('estados')->insert([
            'descripcion' => 'rechazado'
        ]);
    }
}

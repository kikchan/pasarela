<?php

use Illuminate\Database\Seeder;

class ValoracionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valoraciones')->delete();
        DB::table('valoraciones')->insert([
            'idComercio' => 2,
            'idTecnico' => 3,
            'valoracion' => 8,
            'comentario' => 'El técnico ha sido muy amable'
        ]);
        DB::table('valoraciones')->insert([
            'idComercio' => 5,
            'idTecnico' => 3,
            'valoracion' => 9,
            'comentario' => ''
        ]);
        DB::table('valoraciones')->insert([
            'idComercio' => 6,
            'idTecnico' => 3,
            'valoracion' => 8,
            'comentario' => 'La respuesta del técnico ha sido muy rápida'
        ]);
        DB::table('valoraciones')->insert([
            'idComercio' => 6,
            'idTecnico' => 4,
            'valoracion' => 5,
            'comentario' => 'La respuesta del técnico ha sido muy lenta'
        ]);
    }
}

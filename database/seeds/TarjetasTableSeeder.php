<?php

use Illuminate\Database\Seeder;

class TarjetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarjetas')->delete();
        DB::table('tarjetas')->insert([
            'numero' => '4889226075981240',
            'caducidad' => '10/19',
            'cvv' => '240'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '4910892216664871',
            'caducidad' => '09/19',
            'cvv' => '501'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '4617557818404440',
            'caducidad' => '11/19',
            'cvv' => '522'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '4261326453930450',
            'caducidad' => '12/19',
            'cvv' => '281'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '4676202204018045',
            'caducidad' => '04/19',
            'cvv' => '835'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '5886658693225404',
            'caducidad' => '06/19',
            'cvv' => '533'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '5672292991982314',
            'caducidad' => '03/19',
            'cvv' => '476'
        ]);
        DB::table('tarjetas')->insert([
            'numero' => '5060347945850759',
            'caducidad' => '03/19',
            'cvv' => '570'
        ]);
    }
}

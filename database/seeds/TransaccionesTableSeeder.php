<?php

use Illuminate\Database\Seeder;

class TransaccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->delete();
        DB::table('tickets')->insert([
            'idComercio' => '6',
            'importe' => 22.50,
        ]);
    }
}

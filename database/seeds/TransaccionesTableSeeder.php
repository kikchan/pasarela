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
        DB::table('transacciones')->delete();
        DB::table('transacciones')->insert([
            'idComercio' => 2,
            'importe' => 520.50,
            'idTarjeta' => 1,
            'idEstado' => 1,
            'comentario' => 'Venta de un portátil hp'
        ]);
        DB::table('transacciones')->insert([
            'idComercio' => 2,
            'importe' => 22.50,
            'idTarjeta' => 2,
            'idEstado' => 1,
            'comentario' => 'Venta de unos auriculares'
        ]);
        DB::table('transacciones')->insert([
            'idComercio' => 5,
            'importe' => 22.50,
            'idTarjeta' => 2,
            'idEstado' => 2,
            'comentario' => 'Venta de una funda para ipad'
        ]);
        DB::table('transacciones')->insert([
            'idComercio' => 6,
            'importe' => 500.00,
            'idTarjeta' => 3,
            'idEstado' => 2,
            'comentario' => 'Venta de un iphone 6'
        ]);
    }
}

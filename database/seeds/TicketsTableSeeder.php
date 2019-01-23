<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
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
            'created_at' => date("Y-m-d H:i:s"),
            'idComercio' => 2,
            'idTecnico' => 3,
            'idTransaccion' => 1,
            'asunto' => 'No he podido realizar el pago',
            'idEstado' => 1
        ]);
        DB::table('tickets')->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'idComercio' => 5,
            'idTecnico' => 3,
            'idTransaccion' => 3,
            'asunto' => 'No he podido realizar el pago',
            'idEstado' => 2
        ]);
        DB::table('tickets')->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'idComercio' => 6,
            'idTecnico' => 3,
            'idTransaccion' => 4,
            'asunto' => 'No me aparece la página para realizar el pago',
            'idEstado' => 3
        ]);
        DB::table('tickets')->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'idComercio' => 6,
            'idTecnico' => 3,
            'asunto' => 'No me deja hacer login',
            'idEstado' => 4
        ]);
        DB::table('tickets')->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'idComercio' => 2,
            'idTecnico' => 4,
            'asunto' => 'En la página de estadística no veo el número de pagos totales realizados',
            'idEstado' => 5
        ]);
    }
}

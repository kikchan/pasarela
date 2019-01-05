<?php

use Illuminate\Database\Seeder;

class MensajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensajes')->delete();
        DB::table('mensajes')->insert([
            'idUsuario' => '',
            'idTicket' => '',
            'comentario' => '',
            'adjunto' => ''
        ]);
        DB::table('mensajes')->insert([
            'idUsuario' => '',
            'idTicket' => '',
            'comentario' => '',
            'adjunto' => ''
        ]);
        DB::table('mensajes')->insert([
            'idUsuario' => '',
            'idTicket' => '',
            'comentario' => '',
            'adjunto' => ''
        ]);
    }
}

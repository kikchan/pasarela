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
            'idUsuario' => 2,
            'idTicket' => 1,
            'comentario' => 'Hola, estoy haciendo un pago y me dice que el número de la tarjeta no es válida',
            'adjunto' => ''
        ]);
        DB::table('mensajes')->insert([
            'idUsuario' => 3,
            'idTicket' => 1,
            'comentario' => 'Hola, estamos revisando la página. En breve le informaremos.',
            'adjunto' => ''
        ]);
        DB::table('mensajes')->insert([
            'idUsuario' => 6,
            'idTicket' => 4,
            'comentario' => 'Buenas, al hacer login me dice que no existe el usuario cuando he comprobado que mi usuario es correcto.',
            'adjunto' => ''
        ]);
    }
}

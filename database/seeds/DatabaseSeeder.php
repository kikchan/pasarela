<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(PasswordResetsTableSeeder::class);
        //$this->call(TarjetasTableSeeder::class);
        //$this->call(EstadosTableSeeder::class);
        $this->call(TransaccionesTableSeeder::class);
        //$this->call(TicketsTableSeeder::class);
        //$this->call(MensajesTableSeeder::class);
        //$this->call(ValoracionesTableSeeder::class);
    }
}

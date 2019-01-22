<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
			'nombre' => 'Antonio',
			'apellidos' => 'García Martinez',
			'nick' => 'Antoni',
			'email' => 'antonio1@gmail.com',
            'password' => bcrypt('12345'),
            'key' => 'cl12345',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '0',
            'esAdministrador' => '1',
            'esTecnico' => '0'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Jose',
			'apellidos' => 'Martinez Lopez',
			'nick' => 'Jose1',
			'email' => 'jose1@gmail.com',
            'password' => bcrypt('12346'),
            'key' => 'cl12346',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '1',
            'esAdministrador' => '0',
            'esTecnico' => '0'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Francisco',
			'apellidos' => 'Lopez Sanchez',
			'nick' => 'Fran',
			'email' => 'francisco1@gmail.com',
            'password' => bcrypt('12347'),
            'key' => 'cl12347',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '0',
            'esAdministrador' => '0',
            'esTecnico' => '1'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Juan',
			'apellidos' => 'Gonzalez Sanchez',
			'nick' => 'Juanito',
			'email' => 'juanito12@gmail.com',
            'password' => bcrypt('12348'),
            'key' => 'cl12348',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '0',
            'esAdministrador' => '0',
            'esTecnico' => '1'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Isabel',
			'apellidos' => 'Jimenez Moreno',
			'nick' => 'Isa',
			'email' => 'isabella@gmail.com',
            'password' => bcrypt('12349'),
            'key' => 'cl12349',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '1',
            'esAdministrador' => '0',
            'esTecnico' => '0'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Carmen',
			'apellidos' => 'Ruiz Rodriguez',
			'nick' => 'Carmen22',
			'email' => 'carmen31@gmail.com',
            'password' => bcrypt('12350'),
            'key' => 'cl12350',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '1',
            'esAdministrador' => '0',
            'esTecnico' => '0'
        ]);
        DB::table('users')->insert([
			'nombre' => 'Kiril',
			'apellidos' => 'Gaydarov',
			'nick' => 'kikchan',
			'email' => 'kvg1@alu.ua.es',
            'password' => bcrypt('123456'),
            'key' => 'cl12351',
            'endpoint'=>'http://185.207.145.237/pruebas/response',
            'esComercio' => '0',
            'esAdministrador' => '1',
            'esTecnico' => '0'
        ]);
    }
}
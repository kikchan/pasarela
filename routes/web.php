<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function() {
    return view('register');
});

Route::get('login', function() {
    return view('login');
});

Route::get('comercio', "ComercioController@vista");

Route::get('pagos={idComercio}', "TransaccionesController@pagos");
Route::get('filtrar/pagos', 'TransaccionesController@filtrarEstado');

Route::get('pruebas', "PasarelaController@pruebas");
Route::get('pruebas/form', "PasarelaController@gform");
Route::post('pruebas/form', "PasarelaController@pform");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

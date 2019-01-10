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
Route::get('comercio/{id}', "ComercioController@general");

Route::get('comercio/{id}/pagos', "TransaccionesController@pagos");
Route::get('comercio/{id}/pagosFiltro', 'TransaccionesController@filtrar');
Route::get('comercio/{id}/pagosBusqueda', 'TransaccionesController@buscarId');

Route::get('pruebas', "PasarelaController@pruebas");
Route::get('pruebas/form', "PasarelaController@gform");
Route::post('pruebas/form', "PasarelaController@pform");

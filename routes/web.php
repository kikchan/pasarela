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
Route::get('comercio/{id}', "TransaccionesController@general");

Route::get('comercio/{id}/pagos', "TransaccionesController@pagos");
Route::get('comercio/{id}/pagosFiltro', 'TransaccionesController@filtrar');
Route::get('comercio/{id}/pagosBusqueda', 'TransaccionesController@buscarId');


//Montoya (NO TOCAR POR DIOS)
Route::get('pruebas/form', "PasarelaController@gform");
Route::get('pruebas/form/generate', "PasarelaController@gen")->name('gen');
Route::post('pruebas/form/generate', "PasarelaController@pgen")->name('pgen');
Route::post('pruebas/form/{web}', "PasarelaController@pform");

Route::get('tickets', 'TicketController@listado');
Route::get('tickets/{id}', 'TicketController@detalles');
Route::get('/detalle_ajax/{id}', 'TicketController@ajax_detalle')->name('detalle_ajax');
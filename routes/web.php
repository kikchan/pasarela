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

//Inicio
Route::get('/', function () {
    return view('welcome');
});

//Comercio
Route::get('comercio', "ComercioController@vista");
Route::get('comercio/{id}', "TransaccionesController@general");

Route::get('vistaTecnicos', "ValoracionesController@vistaTecnicos");

Route::get('administrador/valoraciones', "ValoracionesController@vistaAdministrador");
Route::get('valoracionesTecnico', "ValoracionesController@vistaTecnico");
Route::get('valoracionesComercio', "ValoracionesController@vistaComercio");
Route::post('valoraciones/crearValoracionComercio', "ValoracionesController@vistaCrearValoracion");
Route::post('/valoraciones/borrarComentario', "ValoracionesController@delete");
Route::post('/valoraciones/crearValoracion', "ValoracionesController@create");

Route::get('pagos={idComercio}', "TransaccionesController@pagos");

Route::get('filtrar/pagos', 'TransaccionesController@filtrarEstado');

Route::get('comercio/{id}/pagos', "TransaccionesController@pagos");
Route::get('comercio/{id}/pagos/{idPago}', "TransaccionesController@detalleTransaccion");
Route::get('comercio/{id}/pagosFiltro', 'TransaccionesController@filtrar');
Route::get('comercio/{id}/pagosBusqueda', 'TransaccionesController@buscarId');

//Administrador
Route::get('administrador', "AdministradorController@vista");
Route::get('administrador/dashboard', "AdministradorController@vista");
Route::get('administrador/valoraciones', "AdministradorController@valoraciones");
Route::get('administrador/listadoCuentas', "AdministradorController@listadoCuentas");

//Técnico
Route::get('tecnico', "TecnicoController@vista");

//Montoya (NO TOCAR POR DIOS)
Route::get('pruebas', "PasarelaController@pruebas");
Route::get('pruebas/form', "PasarelaController@gform");
Route::post('pruebas/response', "PasarelaController@endpoint");
Route::get('pruebas/form/generate', "PasarelaController@gen")->name('gen');
Route::post('pruebas/form/generate', "PasarelaController@pgen")->name('pgen');
//TPVV
Route::post('generar/{web}', "PasarelaController@pform");
Route::get('pagar/{id}', "PasarelaController@pagar");
Route::post('check/{id}', "PasarelaController@check");


Route::get('tickets', 'TicketController@listado');
Route::get('tickets/{id}', 'TicketController@detalles');
Route::get('/detalle_ajax/{id}', 'TicketController@ajax_detalle')->name('detalle_ajax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

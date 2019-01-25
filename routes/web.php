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
Route::get('/comercio/valoracionesComercio', "ValoracionesController@vistaComercio");

Route::post('/comercio-soporte/valoraciones/crearValoracion', "ValoracionesController@create");

Route::get('pagos={idComercio}', "TransaccionesController@pagos");

Route::get('filtrar/pagos', 'TransaccionesController@filtrarEstado');

Route::get('comercio/{id}/pagos', "TransaccionesController@pagos");
Route::get('comercio/{id}/wiki', "TransaccionesController@wiki");
Route::get('comercio/{id}/pagos/{idPago}', "TransaccionesController@detalleTransaccion");
Route::get('comercio/{id}/pagos/{idPago}/devolucion', "PasarelaController@devolucion");
Route::get('comercio/{id}/pagosFiltro', 'TransaccionesController@filtrar');
Route::get('comercio/{id}/pagosBusqueda', 'TransaccionesController@buscarId');

//Administrador
Route::get('administrador', "AdministradorController@listadoCuentas");
Route::get('administrador/valoraciones', "AdministradorController@valoraciones");
Route::get('administrador/listadoCuentas', "AdministradorController@listadoCuentas")->name('listadoCuentas');
Route::get('administrador/borrarCuenta/{id}', "AdministradorController@borrarCuenta");
Route::get('administrador/crearCuenta', "AdministradorController@crearCuenta");
Route::post('administrador/crearCuentaUsuario', "AdministradorController@crearCuentaUsuario");

Route::get('administrador/editarCuenta/{id}', "AdministradorController@editarCuentaForm");
Route::post('administrador/editarCuenta/{id}', "AdministradorController@editarCuentaUsuario")->name('editarCuentaUsuario');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::group(['middleware' => 'admin', 'prefix' => 'administrador'], function () {
    Route::get('tickets', 'TicketController@listado')->name('tickets');
    Route::get('tickets/{id}', 'TicketController@detalles')->name('detalles');
    Route::put('tickets/{id}', 'TicketController@cerrarTicket')->name('cerrarTicket');
	Route::get('valoracionesAdministrador', "ValoracionesController@vistaAdministrador")->name('valoracionesAdministrador');
	Route::post('valoracionesAdministrador/borrarComentario', 'ValoracionesController@delete');
});

// Tecnico
Route::group(['middleware' => 'tecnico', 'prefix' => 'tecnico'], function () {
    // Home de técnico
    Route::get('/', 'TicketController@listadoTecnico');
    Route::get('tickets', 'TicketController@listadoTecnico')->name('ticketsT');
    Route::get('tickets/{id}', 'TicketController@detallesTecnico')->name('detallesTicketT');
    Route::put('tickets/{id}', 'TicketController@gestionarTicketT')->name('gestionarTicketT');
    Route::post('tickets/{id}', 'TicketController@mensajeTicketT')->name('mensajeTicketT');
	Route::get('valoraciones', "ValoracionesController@vistaTecnico")->name('valoracionesTecnico');
});

// Comercio
Route::group(['middleware' => 'comercio', 'prefix' => 'comercio-soporte'], function () {
	Route::get('valoracionesComercio', "ValoracionesController@vistaComercio")->name('valoracionesComercio');
    
    Route::get('tickets', 'TicketController@listadoComercio')->name('ticketsC');
    Route::get('tickets/{id}', 'TicketController@detallesComercio')->name('detallesTicketC');
    Route::get('crearTicket', 'TicketController@formCrearTicket')->name('formCrearTicket');
    Route::post('tickets', 'TicketController@crearTicket')->name('crearTicket');
    Route::post('tickets/{id}', 'TicketController@mensajeTicketC')->name('mensajeTicketC');
	Route::post('valoraciones/crearValoracionComercio', 'ValoracionesController@vistaCrearValoracion')->name('crearValoracionComercio');

});
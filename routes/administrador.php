<?php



Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('administrador')->user();

    $usuario = auth()->user();

//    dd($usuario->nombre);
    $clientes = App\Cliente::all();
//    dd($clientes);
//    $mensaje = '';
    return view('administrador.inicio')->with(['usuario'=>$usuario, 'clientes'=>$clientes]);
})->name('home');

Route::get('/verproyecto/{clienteid}','ProyectoController@verproyecto');

Route::get('/editarproyecto/{proyectoid}','ProyectoController@editar');

Route::post('/editarproyecto/{proyectoid}','ProyectoController@editarproyecto');

Route::get('/crearproyecto/{clienteid}','ProyectoController@crear');

Route::post('/crearproyecto/{clienteid}','ProyectoController@crearproyecto');


Route::get('/crearcliente/{id}','ClienteController@crear');
Route::post('/crearcliente/{id}','ClienteController@crearcliente');


Route::get('/verusuarios','UsuarioAuth\RegisterController@ver');

Route::get('/crearusuario','UsuarioAuth\RegisterController@crear');
Route::post('/crearusuario','UsuarioAuth\RegisterController@crearusuario');
Route::get('/editarusuario/{usuarioid}','UsuarioAuth\RegisterController@editar');
Route::post('/editarusuario/{usuarioid}','UsuarioAuth\RegisterController@editarusuario');


Route::get('/verdesarrolladores','DesarrolladorAuth\RegisterController@ver');

Route::get('/creardesarrollador','DesarrolladorAuth\RegisterController@crear');
Route::post('/creardesarrollador','DesarrolladorAuth\RegisterController@creardesarrollador');
Route::get('/editardesarrollador/{desarrolladorid}','DesarrolladorAuth\RegisterController@editar');
Route::post('/editardesarrollador/{desarrolladorid}','DesarrolladorAuth\RegisterController@editardesarrollador');


Route::get('/verequipos','EquipoController@ver');

Route::get('/crearequipo','EquipoController@crear');
Route::post('/crearequipo','EquipoController@crearequipo');


Route::get('/verstakeholders','EquipoController@ver');

Route::get('/crearstakeholder','EquipoController@crear');
Route::post('/crearstakeholder','EquipoController@crearstakeholder');






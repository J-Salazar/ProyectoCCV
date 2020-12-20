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


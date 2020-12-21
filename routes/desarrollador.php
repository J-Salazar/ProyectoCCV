<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('desarrollador')->user();

    $usuario = Auth::user();
    //dd($users);

    return view('desarrollador.verepica')->with(['usuario'=>$usuario]);
})->name('home');


Route::get('/verepica','EpicaController@v');
Route::get('/verepica/{desarrolladorid}','EpicaController@ver');

Route::get('/editarepica/{epicaid}','EpicaController@editar');
Route::post('/editarepica/{epicaid}','EpicaController@editarepica');

Route::get('/crearepica/{desarrolladorid}','EpicaController@crear');
Route::post('/crearepica/{desarrolladorid}','EpicaController@crearepica');



Route::get('/verhistoria','HistoriaUsuarioController@v');
Route::get('/verhistoria/{desarrolladorid}','HistoriaUsuarioController@ver');

Route::get('/editarhistoria/{historiaid}','HistoriaUsuarioController@editar');
Route::post('/editarhistoria/{historiaid}','HistoriaUsuarioController@editarhistoriausuario');

Route::get('/crearhistoria/{desarrolladorid}','HistoriaUsuarioController@crear');
Route::post('/crearhistoria/{desarrolladorid}','HistoriaUsuarioController@crearhistoriausuario');


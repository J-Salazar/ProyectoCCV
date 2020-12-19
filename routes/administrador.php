<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('administrador')->user();

    //dd($users);

    return view('administrador.home');
})->name('home');


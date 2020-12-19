<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('desarrollador')->user();

    //dd($users);

    return view('desarrollador.home');
})->name('home');


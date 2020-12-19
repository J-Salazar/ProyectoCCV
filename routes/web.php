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

Route::group(['prefix' => 'administrador'], function () {
  Route::get('/login', 'AdministradorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdministradorAuth\LoginController@login');
  Route::post('/logout', 'AdministradorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdministradorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdministradorAuth\RegisterController@register');

  Route::post('/password/email', 'AdministradorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdministradorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdministradorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdministradorAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'usuario'], function () {
  Route::get('/login', 'UsuarioAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UsuarioAuth\LoginController@login');
  Route::post('/logout', 'UsuarioAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UsuarioAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UsuarioAuth\RegisterController@register');

  Route::post('/password/email', 'UsuarioAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UsuarioAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UsuarioAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UsuarioAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'desarrollador'], function () {
  Route::get('/login', 'DesarrolladorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'DesarrolladorAuth\LoginController@login');
  Route::post('/logout', 'DesarrolladorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'DesarrolladorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'DesarrolladorAuth\RegisterController@register');

  Route::post('/password/email', 'DesarrolladorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'DesarrolladorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'DesarrolladorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'DesarrolladorAuth\ResetPasswordController@showResetForm');
});

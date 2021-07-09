<?php
//Importar el facade 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//para validar
use Illuminate\Validation\ValidationException;


use \App\Http\Controllers\Auth\LoginController;

Route::view('/','welcome');
//para que funcione la redireccion se le agrega el nombre
//el middleware guest redirecciona si ya esta logueado
Route::view('/login','login')->name('login')->middleware('guest');

// el middleware auth no deja pasar a la ruta si no esta autenticado
Route::view('/dashboard','dashboard')->middleware('auth');
//creamos una ruta que reciba post
//primer parametro es el controlador y el segundo el metodo a usar
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
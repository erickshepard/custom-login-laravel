<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::view('/login','login');
Route::view('/dashboard','dashboard');
//creamos una ruta que reciba post
Route::post('login', function(){
    return 'Post login';
});
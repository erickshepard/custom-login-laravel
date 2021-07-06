<?php
//Importar el facade 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
//para que funcione la redireccion se le agrega el nombre
//el middleware guest redirecciona si ya esta logueado
Route::view('/login','login')->name('login')->middleware('guest');

// el middleware auth no deja pasar a la ruta si no esta autenticado
Route::view('/dashboard','dashboard')->middleware('auth');
//creamos una ruta que reciba post
Route::post('login', function(){
    //request nos trae los datos
    //con el metodo only traemos solo los datos que necesitamos
    //guardamos los datos del formulario 
    $credentials = request()->only('email','password');
    //ver el contenido metodo dump() 
    //dump($credentials);
    //Para validar los datos del form con la base de datos
    //attemp acepta un arreglo de datos y un boleano para maje
    //jar la session
    //hacemos una validacion si el login fue exitoso o no
    if(Auth::attempt($credentials)){
        //manejar la session
        request()->session()->regenerate();
        //mensaje de login ok o re direccion a dasboard

        return redirect('/dashboard');
    }
    //login fallo re direccionar a login
    return redirect('/login');
    
});
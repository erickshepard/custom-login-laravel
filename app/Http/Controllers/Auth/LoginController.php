<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // Login
    public function login(Request $request){
      
            //request nos trae los datos
            //con el metodo only traemos solo los datos que necesitamos
            //guardamos los datos del formulario 
            //y los validamos
            //$credentials = $request->validate([
                //Reglas de validacion
               // 'email' => ['required','email','string'],
             //   'password' => ['required','string']
           // ]);
        
            //Guardamos si el user quiere guardar la session
            $remember = $request->filled('remember');
            $buscar= $request->email;
            $user = DB::table('usuarios')->where('correo','=','erick@skyballoons.mx')->first();
            
            dd($user);

            if($user->contrasena === md5($request->password)){
                Auth::login($user);
                //regeneramos la session
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('status','You are logged in');
            }

            //

            // y lo pasamos como segundo atributo al metodo attemp
            //dd(request()->filled('remember'));
            //ver el contenido metodo dump() 
            //dump($credentials);
            //Para validar los datos del form con la base de datos
            //attemp acepta un arreglo de datos y un boleano para maje
            //jar la session
            //hacemos una validacion si el login fue exitoso o no
        
            //Para recordar la session mandamos true o false


           // if(Auth::attempt($credentials, $remember)){
                //manejar la session
             //   $request->session()->regenerate();
                //mensaje de login ok o re direccion a dasboard
                //Para mostrar mensaje usamos with
                //es buena idea usar intended para re direccionar a la url que intento acceder el user
               // return redirect()->intended('/dashboard')->with('status','You are logged in');
            //}

            
            //login fallo re direccionar a login
            //return redirect('/login');
            //Para mandar mensajes si las credenciales no son validas usamos


            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
            
        
    }
    // Logout
    public function logout( Request $request){
        //para desloguear 
        Auth::logout();

        //
        $request->session()->invalidate();
        //
        $request->session()->regenerateToken();
        //regresar a una vista
        return redirect('/login')->with('status','estas deslogueado');
        
    }
}

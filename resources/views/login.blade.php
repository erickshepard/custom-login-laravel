<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <!--Incluimos la navegacion-->
    @include('partials.nav')
    <h1>Login</h1>
    <!--Mostrar errores-->
    @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error}}
            </li>
            
        @endforeach
        </ul> 
    @endif
    
    <!--imprimir usuario-->
    <pre>{{ Auth::user()}}</pre>
    <!--Formulario de autenticación-->
    <form method="POST">
        @csrf
        <!--para mantener la el campo si la contraseña falla usamos
            value="{{ old('email')}}"
        -->
        <input name="email" type="email" autofocus required value="{{ old('email')}}" placeholder="email">
        <!--imprimimos el error en el campo correspondiente-->
        @error('email'){{$message}} @enderror
        <input name="password" type="password" required placeholder="password">
        @error('password'){{$message}} @enderror
        <input type="checkbox" name="remember" id=""> <br>
        <button type="submit">Login</button>

    </form>
</body>
</html>
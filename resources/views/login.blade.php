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
    <!--imprimir usuario-->
    <pre>{{ Auth::user()}}</pre>
    <!--Formulario de autenticación-->
    <form method="POST">
        @csrf
        <input name="email" type="email" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button type="submit">Login</button>

    </form>
</body>
</html>
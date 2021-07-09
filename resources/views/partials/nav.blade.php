<a href="/">Inicio</a>
@auth
<a href="/dashboard">Dashboard</a>
<!--Para cerrar la session lo haremos a traves del metodo post-->


<form action="/logout" method="POST" style="display: inline">
    @csrf

        <a href="#" onclick="this.closest('form').submit()">Logout</a>
</form>
 @else 
 <a href="/login">Login</a>  
@endauth

@if (session('status'))
    <br>
    {{ session('status')}}
@endif

<header class="header">
    <a href="index.html">
        <img class="header__logo" src="{{Vite::asset('/resources/img/logo.png')}}" alt="Logotipo">
    </a>
</header>

<nav class="navegacion">
    @guest
        <a class="navegacion__enlace" href="{{route('IndexLogin')}}">Iniciar sesión</a>
        <a class="navegacion__enlace" href="{{route('IndexRegistro')}}">Registrarse</a>
    @endguest
    <a class="navegacion__enlace navegacion__enlace--activo" href="{{route('index')}}">Tienda</a>
    <a class="navegacion__enlace" href="{{route('nosotros')}}">Nosotros</a>
    @auth
        <form action="{{route('Logout')}}" method="post">
            @csrf
            <input type="submit" value="Cerrar sesión" class="btn-sesion">
        </form>
    @endauth
</nav>
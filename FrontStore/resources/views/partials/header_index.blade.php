<header class="header">
    <a href="index.html">
        <img class="header__logo" src="{{Vite::asset('/resources/img/logo.png')}}" alt="Logotipo">
    </a>
</header>

<nav class="navegacion">
    <a class="navegacion__enlace navegacion__enlace--activo" href="{{route('index')}}">Tienda</a>
    <a class="navegacion__enlace" href="{{route('nosotros')}}">Nosotros</a>
</nav>
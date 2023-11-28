@extends('layouts.app_index')
@section('container')
    <main class="contenedor">
        <h1>Nuestros Productos</h1>

        @auth
            @if (auth()->user()->rol=="Administrador")
                <form action="{{route('ProductosCreate')}}" method="GET" class="alinear-izquierda">
                    <input type="submit" value="Nuevo Producto" class="boton-verde">
                </form>
            @endif
        @endauth

        <div class="grid">
            @foreach ($productos as $producto)
                <div class="producto">
                    <a href="{{route('ProductosShow',$producto->id)}}">
                        <img loading="lazy" class="producto__imagen" src="{{$producto->getUrlImagenAttribute()}}" alt="{{$producto->imagen}}">
                        <div class="producto__informacion">
                            <p class="producto__nombre">{{$producto->titulo}}</p>
                            <p class="producto__precio">${{$producto->precio}}</p>
                        </div>
                    </a>
                </div>  <!--.producto-->
            @endforeach

            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>
        </div>
    </main>
@endsection

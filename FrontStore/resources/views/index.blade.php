@extends('layouts.app_index')
@section('container')
    <main class="contenedor">
        <h1>Nuestros Productos</h1>

        <div class="grid">
            @foreach ($productos as $producto)
                <div class="producto">
                    <a href="">
                        <img class="producto__imagen" src="{{$producto->getUrlImagenAttribute()}}" alt="{{$producto->imagen}}">
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

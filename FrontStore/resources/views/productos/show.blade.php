@extends('layouts/app_index')
@section('container')
<main class="contenedor">
    <h1>{{$productos->titulo}}</h1>

    <div class="camisa">
        <img loading="lazy" class="camisa__imagen" src="{{$productos->getUrlImagenAttribute()}}" alt="{{$productos->imagen}}">
            {{-- <img loading="lazy" src="{{$entrada->getUrlImagenAttribute()}}" alt="{{$entrada->imagen}}"> --}}

        <div class="camisa__contenido">
            <p>{{$productos->resumen}}</p>

            <form class="formulario">
                <select class="formulario__campo">
                    <option disabled selected>-- Seleccionar Talla --</option>
                    @foreach ($tallas as $talla)
                        {{-- <option value="{{$categoria->id}}">{{$categoria->nombre}}</option> --}}
                        <option value="{{$talla->id}}" class="opciones">{{$talla->nombre}}</option>
                    @endforeach
                    
                    {{-- <option class="opciones">Mediana</option>
                    <option class="opciones">Grande</option> --}}
                </select>
                    
                <input class="formulario__campo" type="number" placeholder="Cantidad" min="1">

                <input class="formulario__submit" type="submit" value="Agregar al Carrito">
            </form>
        </div>
    </div>
</main>
@endsection
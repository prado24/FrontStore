@extends('layouts.app_index')
@section('container')
<main class="contenedor seccion">
    <h1>Nueva entrada de blog</h1>

    <form class="formulario" action="{{route('ProductosStore')}}" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>Información de la entrada</legend>

            <label for="nombre">Titulo:</label>
            <input type="text" placeholder="Titulo" id="titulo" name="titulo" value="{{old('titulo')}}">
            @error('titulo')
                <div class="alerta">
                    {{$message}}
                </div>
            @enderror

            <label for="resumen">Resumen:</label>
            <textarea name="resumen" id="resumen" value="{{old('resumen')}}"></textarea>
            @error('resumen')
                <div class="alerta">
                    {{$message}}
                </div>
            @enderror
            
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/*" onchange="mostrarVistaPrevia(event)">
            <div id="vista-previa">
                @if(old('imagen_actual'))
                    <img src="{{ old('imagen_actual') }}" alt="Vista previa">
                @endif
            </div>
            @error('imagen')
                <div class="alerta">
                    {{ $message }}
                </div>
            @enderror
            <input type="hidden" name="imagen_actual" id="imagen_actual" value="{{ old('imagen_actual') }}">
        </fieldset>
        <input type="submit" value="Guardar" class="btn-crear">
        <a href="{{route('index')}}" class="boton-amarillo btn-create-blog">Cancelar</a>
    </form>
</main>
@endsection
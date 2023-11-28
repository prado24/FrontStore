@extends('layouts/app_index')
@section('container')
<main class="contenedor">
    <h1>{{$productos->titulo}}</h1>
    @auth
        @if (auth()->user()->rol=="Administrador")
            <div class="centrar-botones">
                <a class="boton-verde alinear-izquierda espacio" href="{{route('ProductosEdit',$productos->id)}}">Editar</a>
                <form class="alinear-izquierda formulario-eliminar" action="{{route('ProductosDestroy',$productos->id)}}" method="post">
                    @csrf @method('DELETE')
                    <button class="boton-verde ">Eliminar</button>
                </form>
            </div>
        @endif
        
    @endauth
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
 const formularios = document.querySelectorAll('.formulario-eliminar');
 
 formularios.forEach(formulario => {
 formulario.addEventListener('submit', function(e) {
 e.preventDefault();
 
 Swal.fire({
 title: '¿Estás seguro?',
 text: '¡Esta acción no es reversible!',
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Sí, eliminar',
 cancelButtonText: 'Cancelar'
 }).then((result) => {
 if (result.isConfirmed) {
 this.submit();
 }
 });
 });
 });
 });
</script>
@endsection
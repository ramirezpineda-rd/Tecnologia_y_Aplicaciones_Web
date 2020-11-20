@extends('layouts.app')


<!--Definir la seccion de los estilos del editor trix-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" 
    integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')
    <a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Volver</a>
@endsection


@section('content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>

                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror "
                        id="titulo"
                        placeholder="Titulo Receta"
                        value={{ old('titulo') }}
                    >

                    <!--Directiva de Laravel para poner un mensaje de error-->
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                        <!--Ponemos un mensaje generado por Laravel-->
                            <strong>{{$message}}</strong>
                    @enderror
        
                    @if(Session::has('alertas'))
                            {{ Session::get('alertas') }}
                    @endif           
                </div>

                <!--Select de categorias-->
                <div class="form-group">
                    <label for='categoria'></label>
    
                    <select 
                        name="categoria"
                        class="form-control @error('categoria') is-invalid @enderror" 
                        id="categoria"
                    >

                        <option value="">--Seleccione-</option>
                        @foreach($categorias as $id => $categoria)
                            <option 
                                value="{{$id}}"
                                {{ old('categoria') == $id ? 'selected' : ''}}
                            >{{$categoria}}</option>
                         @endforeach
                    </select>
        
                    <!--Validacion y mandamos retroalimentacion al usuario-->
                     @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                        <!--Ponemos un mensaje de laravel-->
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <!--Final del select-->

                <!--Inicio campo de texto de Preparacion con Trix"-->
                <div class="form-group mt-3">
                    <label for="preparacion"> Preparación</label>
                    <!--Campo de texto preparación con validación para que no se
                     elimine al actualizar la página (old)-->
                    <input id="preparacion" type="hidden" name="preparacion" value="{{ old ('preparacion') }}">
                    
                    <!--Agregamos el editor-->
                    <trix-editor
                        class="form-control @error('preparacion') is-invalid @enderror"
                        input="preparacion"
                    ></trix-editor>
                    <!--Validación con mensaje de error-->
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                        <!--ponemos un mensaje generado por laravel-->
                            <strong> {{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <!--Fin de campo de texto preparacion-->

                <!--Inicio campo de texto de Ingredientes con Trix"-->
                <div class="form-group mt-3">
                    <label for="ingredientes"> Ingredientes</label>
                    <!--Campo de texto preparación con validación para que no se
                    elimine al actualizar la página (old)-->
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old ('ingredientes') }}">
                    <!--Agregamos el editor-->
                    <trix-editor
                        class="form-control @error('ingredientes') is-invalid @enderror"
                        input="ingredientes"
                    ></trix-editor>
                    <!--Validación con mensaje de error-->
                     @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <!--ponemos un mensaje generado por laravel-->
                            <strong> {{$message}}</strong>
                    @enderror
                </div>
                <!--Fin de campo de texto ingredientes-->

                <!--Campo para carga de imagenes-->
                <div class="form-group mt-3">
                    <label for="imagen"> Elige una imagen</label>
                    <input
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    <!--Validación con mensaje de error-->
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <!--ponemos un mensaje generado por laravel-->
                            <strong> {{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <!--Fin de campo de imagen-->
                <!--Boton-->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar receta">
                </div>
            </form>
        </div>
    </div>

@endsection

<!---Definir la seccion de los script de editor Trix-->

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
@endsection

@endsection


@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.index')}}">
        Meseros
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.index')}}">
        Volver
    </a>
@endsection

@section('content')

    <div class="col-md-8 mx-auto bg-danger text-white p-3">
        <h2 class="text-left mb-7">Agregar mesa</h2>
    </div>
    <!-- Diseñar el formulario para guardar receta -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="POST" action="{{route('mesas.store')}}"><!--Validacion -->
        @csrf

        <!--Campo de nombre-->
        <div class="form-group">
            <label for="Nombre de la mesa"></label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombre del mesero" value={{old('nombre')}}>
                <!--Directiva de Laravel para poner un mensaje de error-->
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                    <!--Ponemos un mensaje generado por Laravel-->
                    <strong>{{$message}}</strong>
                @enderror
                
                @if(Session::has('alertas'))
                        {{ Session::get('alertas') }}
                @endif           
        </div>

        <!--Boton-->
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Agregar mesa">
        </div>
        </form>
        </div>
    </div>

@endsection
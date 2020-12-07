@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.index')}}">
        Mesas
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.index')}}">
        Volver
    </a>
@endsection

@section('content')

    <div class="col-md-8 mx-auto bg-danger text-white p-3">
        <h2 class="text-left mb-7">Agregar mesero</h2>
    </div>
    <!-- Diseñar el formulario para guardar receta -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="POST" action="{{route('meseros.store')}}"><!--Validacion -->
        @csrf

        <!--Campo de nombre-->
        <div class="form-group">
            <label for="Nombre del mesero"></label>
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

        <!--Campo de edad-->
        <div class="form-group">
            <label for="Edad del mesero"></label>
            <input type="text" name="edad" class="form-control @error('edad') is-invalid @enderror"
                placeholder="Edad del mesero" value={{old('edad')}}>
                <!--Directiva de Laravel para poner un mensaje de error-->
                @error('edad')
                    <span class="invalid-feedback d-block" role="alert">
                    <!--Ponemos un mensaje generado por Laravel-->
                    <strong>{{$message}}</strong>
                @enderror
                
                @if(Session::has('alertas'))
                        {{ Session::get('alertas') }}
                @endif           
        </div>

        <!--Campo de telefono-->
        <div class="form-group">
            <label for="Telefono del mesero"></label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                placeholder="Telefono del mesero" value={{old('telefono')}}>
                <!--Directiva de Laravel para poner un mensaje de error-->
                @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                    <!--Ponemos un mensaje generado por Laravel-->
                    <strong>{{$message}}</strong>
                @enderror
                
                @if(Session::has('alertas'))
                        {{ Session::get('alertas') }}
                @endif           
        </div>

        <!--Campo de correo-->
        <div class="form-group">
            <label for="Correo del mesero"></label>
            <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror"
                placeholder="Correo del mesero" value={{old('correo')}}>
                <!--Directiva de Laravel para poner un mensaje de error-->
                @error('correo')
                    <span class="invalid-feedback d-block" role="alert">
                    <!--Ponemos un mensaje generado por Laravel-->
                    <strong>{{$message}}</strong>
                @enderror
                
                @if(Session::has('alertas'))
                        {{ Session::get('alertas') }}
                @endif           
        </div>

        <!--Select de mesas-->
        <div class="form-group">
            <label for='mesas'></label>
            <select name="mesas"
                class="form-control @error('mesas') is-invalida @enderror" id="mesas">

                <option value="">--Asignar mesa--</option>
                @foreach($mesas as $id => $mesa)
                    <option value="{{$id}}" {{ old('mesas') == $id ? 'selected' : ''}}>
                        {{$mesa}}
                    </option>
                @endforeach
                </select>
                <!--Validacion y mandamos retroalimentacion al usuario-->
            @error('mesas')
            <span class="invalid-feedback d-block" role="alert">
                <!--Ponemos un mensaje de laravel-->
                <strong>{{$message}}</strong>
            @enderror

        </div>
        <!--Final del select-->

        <!--Boton-->
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Agregar mesero">
        </div>
        </form>
        </div>
    </div>

@endsection
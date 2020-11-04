@extends('layouts.app')

@section('botones')
    <a href="{{route ('recetas.index')}}" 
        class="btn btn-primary mr-2" text-white>Volver</a>
@endsection


@section('content')


<h2 class="text-center mb-5">Crear nueva receta </h2>
<!--Diseñar el formulario para guardar recetas -->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <form method="POST" action ="{{ route('recetas.store')}}"novalidate>
        @csrf
            <!--Campo de receta-->
            {{'categorias'}}
            <div class="form-group">
                    <label for="titulo de receta"></label>
                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo) is-invalid @enderror"
                        placeholder="Titulo de la receta"
                        value = {{old('titulo')}}
                    />
                    <!--Directiva de Laravel para poner un mensaje de error-->
                    @error('titulo')
                        <spam class="invalid-feedback d-block" role="alert">
                            <!--ponemos un mensaje generado por laravel-->
                            <strong>{{message}}</strong>
                    @enderror
            </div>

            <!--Select de categorias-->
            <div class="categoria">Categoria</label>
            <select 
                name="categoria"
                class="form-control @error('categoria')"
                id="categoria"
            >
            @foreach($categorias as $id => $categoria)
                <option vaue="{{$id}}">{{$categoria}}</option>
            @endforeach
            <!--Boton-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta">
            </div>
    </form>
    </div>
</div>


@endsection

<!--Metodo POST es para almacenar -->


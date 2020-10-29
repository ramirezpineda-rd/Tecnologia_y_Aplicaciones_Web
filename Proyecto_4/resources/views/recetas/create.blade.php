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
    <form method="POST" action ="{{ route('recetas.store'}}">
        @csrf
            <!--Campo de receta-->
            <div class="form-group">
                    <label for="titulo de receta"></label>
                    <input type="text"
                        name="titulo"
                        class="form-control"
                        placeholder="Titulo de la receta"
                    />
            </div>
            <!--Boton-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta">
            </div>
    </form>
    </div>
</div>


@endsection

<!--Metodo POST es para almacenar -->


@extends('layouts.app')<!--Hereda de layouts -->


@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Categoria: {{ $categoriaReceta->nombre }}
        </h2>

        <div class="row">
            @foreach ($recetas as $receta)
                @include('ui.receta')<!--usa el grid de bosstraap-->
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $recetas->links() }}
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <!--Vista principal del ecetario--> 
    
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoría</th>
                    <th scole="col">Acciones</th>
                </tr><!--Formulario-->
            </thead>

            <tbody>

                @foreach ($recetas as $receta)
                    <tr><!--Creado en propio componenete en js-->
                        <td> {{$receta->titulo}} </td>
                        <td> {{$receta->categoria->nombre}} </td>
                        <td>

                            <eliminar-receta
                                receta-id={{$receta->id}}
                            ></eliminar-receta>
                            <!--Botones para editar y visualizar-->
                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }} " class="btn btn-dark d-block mb-2">Editar</a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }} " class="btn btn-success d-block">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>


        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">

            @if ( count( $usuario->meGusta ) > 0 )<!--Para contar los MeGusta-->
                <ul class="list-group">
                    @foreach( $usuario->meGusta as $receta )
                        <li class="list-group-item d-flex justify-content-between align-items-center"><!--Boostraap-->
                            <p> {{$receta->titulo}}</p>

                            <a class="btn btn-outline-success text-uppercase font-weight-bold" href="{{ route('recetas.show', ['receta' => $receta->id ])}}">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">Aún no tienes recetas Guardadas <!--Texto alternativo para decir cuando no hay recetas-->
                    <small> Dale me gusta a las recetas y aparecerán aquí</small>
                </p>

            @endif
        </div>

    </div>


@endsection
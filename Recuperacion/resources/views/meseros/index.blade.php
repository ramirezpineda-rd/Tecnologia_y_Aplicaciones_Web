@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.index')}}">
        Mesas
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.create')}}">
        Agregar un mesero
    </a>
@endsection

@section('content')

    <h2 class="text-left mb-5">Listado de meseros</h2>
    <div class="col-md-10 mx-auto p-3">
        <table class="table">
            <thead class="bg-danger text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Edad</th>
                    <th scole="col">Telefono</th>
                    <th scole="col">Correo</th>
                    <th scole="col">Mesa Asignada</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach ($meseros as $mesero)

                <tr>
                    <td>{{$mesero->nombre}}</td>
                    <td>{{$mesero->edad}}</td>
                    <td>{{$mesero->telefono}}</td>
                    <td>{{$mesero->correo}}</td>
                    <td>{{$mesero->mesaAsignada->nombre}}</td>
                    <td>
                        <a href="{{ route("meseros.show", ['mesero' => $mesero->id]) }}" 
                            class="btn btn-primary d-block mb-2">Ver</a>
                        
                        <a href="{{ route("meseros.edit", ['mesero' => $mesero->id]) }}" 
                            class="btn btn-dark d-block mb-2">Editar</a>

                        <form method="POST" action="{{ route("meseros.destroy", ['mesero' => $mesero->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger d-block mb-2">Eliminar</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
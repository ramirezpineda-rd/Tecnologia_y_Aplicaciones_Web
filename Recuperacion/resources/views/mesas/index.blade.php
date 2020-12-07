@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.index')}}">
        Meseros
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.create')}}">
        Agregar una mesa
    </a>
@endsection

@section('content')

    <h2 class="text-left mb-5">Listado de mesas</h2>
    <div class="col-md-10 mx-auto p-3">
        <table class="table">
            <thead class="bg-danger text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach ($mesas as $mesa)

                <tr>
                    <td>{{$mesa->nombre}}</td>
                    <td>
                        <a href="{{ route("mesas.show", ['mesa' => $mesa->id]) }}" 
                            class="btn btn-primary d-block mb-2">Ver</a>
                        
                        <a href="{{ route("mesas.edit", ['mesa' => $mesa->id]) }}" 
                            class="btn btn-dark d-block mb-2">Editar</a>

                        <form method="POST" action="{{ route("mesas.destroy", ['mesa' => $mesa->id]) }}">
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
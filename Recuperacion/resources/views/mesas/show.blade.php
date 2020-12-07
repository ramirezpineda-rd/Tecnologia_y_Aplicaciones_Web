@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.index')}}">
        Meseros
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.index')}}">Volver</a>
@endsection

@section('content')

    <div class="col-md-6 mx-auto bg-danger text-white p-3">
        <h2 class="text-left mb-7">{{$mesa->nombre}}</h2>
    </div>
    <div class="col-md-6 mx-auto bg-light p-4">
        <div class="col-md-5">
            <h4 class="text-left">Agregada el: {{$mesa->created_at}}</h4>
        </div>
    </div>

@endsection
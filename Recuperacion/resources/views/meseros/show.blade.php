@extends('layouts.app')

@section('botones')
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('mesas.index')}}">
        Mesas
    </a>
    <a class="btn btn-outline-light mr-2 font-weight-bold" href="{{route('meseros.index')}}">Volver</a>
@endsection

@section('content')

    <div class="col-md-6 mx-auto bg-danger text-white p-3">
        <h2 class="text-left mb-7">{{$mesero->nombre}}</h2>
    </div>
    <div class="col-md-6 mx-auto bg-light p-4">
        <div class="col-md-5">
            <h4 class="text-left">Edad: {{$mesero->edad}}</h4>
        </div>
        <div class="col-md-5">
            <h4 class="text-left">Telefono: {{$mesero->telefono}}</h4>
        </div>
        <div class="col-md-5">
            <h4 class="text-left">Correo: {{$mesero->correo}}</h4>
        </div>
        <div class="col-md-5">
            <h4 class="text-left">Mesa asignada: {{$mesero->mesaAsignada->nombre}}</h4>
        </div>
    </div>

@endsection
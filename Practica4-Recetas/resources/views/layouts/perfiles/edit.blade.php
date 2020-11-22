@extends('layouts.app')


<!--Definir la seccion de los estilos del editor trix-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" 
    integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')
    <a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Volver</a>
@endsection


@section('content')
    {{-- {{$perfil->usuario }} --}}

    <h1 class="text-center">Editar Mi Perfil</h1>

   <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form
                action="{{ route('perfiles.update', ['perfil' => $perfil->id ]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf<!--directiva para verificar el token-->
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label><!--Pueden cambiar el nombre-->

                    <input type="text"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror "
                        id="nombre"
                        placeholder="Tu Nombre"
                        value="{{ $perfil->usuario->name }}"
                    >

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">Sitio Web</label>

                    <input type="text"
                        name="url"
                        class="form-control @error('url') is-invalid @enderror "
                        id="url"
                        placeholder="Tu Sitio Web"
                        value="{{ $perfil->usuario->url }}"
                    >

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>
                    <input id="biografia" type="hidden" name="biografia"  value="{{ $perfil->biografia }}" >
                    <trix-editor 
                        class="form-control @error('biografia') is-invalid @enderror "
                        input="biografia"
                    ></trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Tu Imagen</label>

                    <input 
                        id="imagen" 
                        type="file" 
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >

                    @if( $perfil->imagen )<!--Si hay imagen, ya que es opcional-->
                        <div class="mt-4">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                        </div>

                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Perfil" >
                </div>

            </form>
        </div>
   </div>


@endsection

<!---Definir la seccion de los script de editor Trix-->

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"
integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection

@endsection


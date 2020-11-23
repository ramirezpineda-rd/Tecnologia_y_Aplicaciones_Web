@extends('layouts.app')

@section('styles')
    <!--Carousel para mostrar las recetas en imagenes dinámicas-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" 
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('hero')<!--Imagen por afuera del contenedor que se muestra en el fondo del index-->
    <div class="hero-categorias">
        <form class="container h-100" action={{ route('buscar.show') }}>
            <div class="row h-100 align-items-center"><!--Se centra el contenido verticalmente-->
                <div class="col-md-4 texto-buscar"><!--Para que el imput no se extienda por toda la pagina-->
                    <p class="display-4">Encuentra una receta para tu próxima comida</p>

                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar Receta"
                    />
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Últimas Recetas</h2><!--clase de bosstrap-->

        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nueva)
                <div class="card ">
                    <img src="/storage/{{ $nueva->imagen }} " class="card-img-top" alt="imagen receta"><!--Texto alternativo-->

                    <div class="card-body h-100">
                        <h3>{{ Str::title( $nueva->titulo ) }}</h3><!--La primer palabra en mayuscula con title-->

                        <p> {{ Str::words(  strip_tags( $nueva->preparacion ), 15 ) }} </p><!--Para que no se vean tantas letras-->
                        <!--Método words cuenta palabras y solo son 15 en este sentido-->
                        <a href=" {{ route('recetas.show', ['receta' => $nueva->id ]) }} "
                            class="btn btn-primary d-block font-weight-bold text-uppercase"
                        >Ver Receta</a><!--Enlace para ver la receta por medio de un botón-->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas más Votadas</h2>
        
        <div class="row">
            @foreach($votadas as $receta)
                @include('ui.receta')
            @endforeach
        </div>
    </div>

    @foreach($recetas as $key => $grupo )
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4"> {{ str_replace('-', ' ',  $key) }} </h2>
            
            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach($recetas as $receta)
                        @include('ui.receta')
                    @endforeach
                @endforeach
            </div>
        </div>

    @endforeach

@endsection
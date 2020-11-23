<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    //Método para llevar a la pagina principal.
    public function index()
    {
          // Mostrar las recetas por cantidad de votos
        // $votadas = Receta::has('likes', '>', 0)->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        //WithCount crea una columna temporal nueva y se llama likes_count
        // Obtener las recetas mas nuevas
        $nuevas = Receta::latest()->take(6)->get();

        // obtener todas las categorias
        $categorias = CategoriaReceta::all();//Nombre del modelo
        // return $categorias;

        // Agrupar las recetas por categoria
        $recetas = [];
        //Arreglo en dos dimenciones para categorías y recetas
        foreach($categorias as $categoria) {
            $recetas[ Str::slug( $categoria->nombre ) ][] = Receta::where('categoria_id', $categoria->id )->take(3)->get();
            //Para mostrar solo 3 de recetas de cada una de las categorías.
        }

        // return $recetas;


        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }

}

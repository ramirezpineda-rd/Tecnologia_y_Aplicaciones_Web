<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;

class CategoriasController extends Controller
{
    //Se pasa la CategoriaReceta
    public function show(CategoriaReceta $categoriaReceta) 
    {
        $recetas = Receta::where('categoria_id', $categoriaReceta->id)->paginate(3);//paginate hace lo mismo que el get
        //Cada receta tiene la columna de categoría_id 
        return view('categorias.show', compact('recetas', 'categoriaReceta'));
        //Se pasa la categoría a la vista.
    }

}

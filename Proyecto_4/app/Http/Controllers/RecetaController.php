<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    //
    public function __invoke()
    {
        $receta = [
            'nombre' => 'Pizza Hawaina',
            'descripcion' => 'Rica pizza de X marca'
        ];

        return $receta;
                

        //Pasar a la vista el array (sintaxis 2):
        //return view ('recetas.index, compact ('recetas', 'categorias'))
            
    }
}

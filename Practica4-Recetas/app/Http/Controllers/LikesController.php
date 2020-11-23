<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;


class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//Se requiere estar autenticado
    }
   
    public function update(Request $request, Receta $receta)
    {
        // Almacena los likes de un usuario a una receta
        return auth()->user()->meGusta()->toggle($receta);
        //toggle es para los megusta.
    }

    
}

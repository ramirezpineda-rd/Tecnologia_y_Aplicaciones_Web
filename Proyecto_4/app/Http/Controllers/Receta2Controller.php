<?php

namespace App\Http\Controllers;

use App\Models\Receta2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Receta2Controller extends Controller
{

    //Validar
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Creamos una consulta a la bd sobre las categorias de las recetas
        DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();
        
        //Esta consulta retorna un array con los elementos de la tarjeta de la tabla categoria


        //Manda a la vista del formulario.
        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=request()->validate([
            //Reglas de validacion: para que se pueda agregar receta
            "titulo"=>'required|min:6'
        ]);

        //Facade de Laravel para insertar un registro a la base de datos.
        DB::table('recetas')->insert([
            'titulo'=>$data['titulo']
        ]); 

        //Almacena la receta a la base de datos
        //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function show(Receta2 $receta2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta2 $receta2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta2 $receta2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta2 $receta2)
    {
        //
    }
}

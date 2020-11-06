<?php

namespace App\Http\Controllers;

use App\Models\Receta2;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Receta2Controller extends Controller
{

    //Validar la restriccion a todos los metodos de usuario autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $categorias = DB::table('categoria_receta')->get()->pluck('nombre','id');
        
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
            'titulo'=>'required|min:6',//tamanio mminimo que se requiere de titulo
            'categoria'=>'required',
            'preparacion'=>'required',
            'ingredientes'=>'erquired',
            'imagen'=>'required|iamge|size:2000',
        ]);

        //Facade de Laravel para insertar un registro a la base de datos.
        DB::table('recetas')->insert([
            'titulo'=>$data['titulo']
        ]); 

        //Almacena la receta a la base de datos
        //dd($request->all());

        return redirect('recetas/create')->with('alertas','La receta a sido agregada a la base de datos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

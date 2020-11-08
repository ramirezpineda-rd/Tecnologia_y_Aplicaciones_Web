<?php

namespace App\Http\Controllers;

use App\Models\Recetas2;
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
            'ingredientes'=>'required',
            'imagen'=>'required|image|size:2000',
        ]);

        //Obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas','public');

        //Facade de Laravel para insertar un registro a la base de datos.
        //Almacenamos en la bd (sin modelo)
        DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'categoria_id'=>data[categoria],
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen'=>1,
            //Determinamos el usuario autenticado (importamos la clase Auth)
            'user_id'=>Auth::user()->id
        ]); 

        //Almacena la receta a la base de datos
        //dd($request->all());

        //Redireccionar
        return redirect()->action('receta2Controller@index');

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

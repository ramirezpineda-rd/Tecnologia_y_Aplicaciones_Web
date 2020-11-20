<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Models\Receta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
//Modelo Receta2
//use App\Receta2;


class Receta2Controller extends Controller
{

    //Validar la restriccion a todos los metodos de usuario autenticado
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('recetas.index');

        $usuario = auth()->user();

        //Paginas para las recetas
        $recetas = Receta::where('user_id', $usuario->id)->paginate(10);

        return view('recetas.index')
            ->with('recetas', $recetas)
            ->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Creamos una consulta a la bd sobre las categorias de las recetas
        //$categorias = DB::table('categoria_receta')->get()->pluck('nombre','id');
        
        //Obtener categoria con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);


        //Esta consulta retorna un array con los elementos de la tarjeta de la tabla categoria

        return view('recetas.create')->with('categorias', $categorias);

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
        //Accedemos a un campo del $request y lo almacenamos con store y la ruta
        // de guardado
        dd($request['imagen']-> store('uploads-recetas','public'));

        $data=request()->validate([
            //Reglas de validacion: para que se pueda agregar receta
            'titulo'=>'required|min:6',//tamanio mminimo que se requiere de titulo
            'categoria'=>'required',
            'preparacion'=>'required',
            'ingredientes'=>'required',
            'imagen'=>'required|image'
        ]);

        //Obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas','public');

        //Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}") ) -> fit(1200, 550);
        $img->save(); 

        //Facade de Laravel para insertar un registro a la base de datos.
        //Almacenamos en la bd (sin modelo)
        /*DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen'=>'imagen.jpg',//nombre temporal
            //Determinamos el usuario autenticado (importamos la clase Auth)
            'user_id'=>Auth::user()->id,
            'categoria_id'=>$data['categoria']
        ]);*/ 

        //Almacena la receta a la base de datos
        //dd($request->all());

        //Almacenar en la BD (con modelo) recetas por usuario
        auth()->user()->recetas()->create([
            'titulo'=>$data['titulo'],
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen'=>$ruta_imagen,
            'categoria_id'=>$data['categoria']
        ]);

        //Redireccionar
        return redirect()->action('recetaController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //Obtener la desicion del usuario, si es que le gusta la receta
        //y esta registrado
        $like = ( auth()->user() ) ?  auth()->user()->meGusta->contains($receta->id) : false; 

        // Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show', compact('receta', 'like', 'likes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta\ $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
        $this->authorize('view', $receta);

        // Con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // Revisar el policy
        $this->authorize('update', $receta);

        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        //Asignar valores
        $receta2->titulo = $data['titulo'];
        $receta2->preparacion = $data['preparacion'];
        $receta2->ingredientes = $data['ingredientes'];
        $receta2->categoria_id = $data['categoria'];

        // Si el usuario sube una nueva imagen
        if(request('imagen')) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

            // Asignar al objeto
            $receta->imagen = $ruta_imagen;
        }

        $receta->save();

        // redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Ejecutar el Policy
        $this->authorize('delete', $receta);

        // Eliminar la receta
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }

    public function search(Request $request)
    {
         // $busqueda = $request['buscar'];
         $busqueda = $request->get('buscar');

         $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(10);
         $recetas->appends(['buscar' => $busqueda]);
 
         return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}

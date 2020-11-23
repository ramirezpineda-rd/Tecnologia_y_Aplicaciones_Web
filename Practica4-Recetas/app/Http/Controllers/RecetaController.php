<?php

namespace App\Http\Controllers;
use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



class RecetaController extends Controller
{   //Habilitar para proteger los demás métodos
    public function __construct()
    {
        //Los métodos show y search son execpción, son públicos. Para que los
        //usuarios no autenticados puedan ver las recetas.
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth->user()->recetas->dd();
        //$recetas = auth()->user()->recetas;

        $usuario = auth()->user();//->id 

        //$meGusta = auth()->user()->meGusta; //BUENA FORMA DE HACERLO

        //Recetas en diversas paginas
        $recetas = Receta::where('user_id', $usuario->id)->paginate(10);
        //Paginate solamente trae la cantidad
        
        //Retorna a la pagina principal de receta
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
        //DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();
        
        //Obtener las categorias (sin modelo)
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');
        
        //Categorias con modelo
        $categorias = CategoriaReceta::all(['id','nombre']);
        
        //Retorna a la vista de crear receta
        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Receta $recetas)
    {
        //$post = $this->post->create($request->all());
        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',               
        ]);

        // obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');


        // Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();


        //Almacenar en la base de datos sin modelo
        /*DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => 'imagen.jpg',
            'user_id'=>Auth::user()->id,
            'categoria_id' => $data['categoria'],
         ]);*/

         //Redireccionar
         //return redirect()->action('RecetaController@index');
        
        
        // almacenar en la BD (con modelo)
        auth()->user()->$recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
       ]);


        // Redireccionar
        return redirect()->action('RecetaController@index');
    }
        
     

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    
     public function show(Receta $receta)
    {
        // Obtener si el usuario actual le gusta la receta y esta autenticado
        $like = ( auth()->user() ) ?  auth()->user()->meGusta->contains($receta->id) : false; 
        //Método contains para verificar

        // Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show', compact('receta', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $this->authorize('view',$receta);

        //Categorias con modelo
        $categorias = CategoriaReceta::all(['id','nombre']);
        
        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // Autorización
        $this->authorize('update', $receta);

        // validación
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        // Asignar los valores
        $receta->titulo = $data['titulo'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->categoria_id = $data['categoria'];
        

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
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Ejecutar la autorización = Policy
        $this->authorize('delete', $receta);

        // Eliminar la receta
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }

    public function search(Request $request) //Método de buscar para no hacer otro controlador más
    {
        // $busqueda = $request['buscar'];
        $busqueda = $request->get('buscar');//En index.blade el name viene como buscar

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(10);
        //Se permite la busqueda en base al titulo, el punto es para concatenar.
        $recetas->appends(['buscar' => $busqueda]);
        //appends para agregar al querystring

        return view('busquedas.show', compact('recetas', 'busqueda'));
        //Carpeta de busquedas en vistas. 
    }

}

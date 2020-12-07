<?php

namespace App\Http\Controllers;

use App\Models\Meseros;
use App\Models\Mesa;
use Illuminate\Http\Request;

class MeserosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listado de meseros
        $meseros = Meseros::all();

        return view('meseros.index', compact('meseros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = Mesa::all()->pluck('nombre', 'id');
        
        // Agregar mesero
        return view('meseros.create', compact('mesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Almacenar datos de create
        $data = request()->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'telefono' => 'required|min:',
            'correo' => 'required',
            'mesas' => 'required'
        ]);

        Meseros::create([
            'nombre' => $data['nombre'],
            'edad' => $data['edad'],
            'telefono' => $data['telefono'],
            'correo' => $data['correo'],
            'mesa_asignada' => $data['mesas']
        ]);

        return redirect(route('meseros.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meseros  $meseros
     * @return \Illuminate\Http\Response
     */
    public function show(Meseros $mesero)
    {
        // Mostrar un mesero
        return view('meseros.show', compact('mesero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meseros  $meseros
     * @return \Illuminate\Http\Response
     */
    public function edit(Meseros $mesero)
    {
        // Editar un mesero
        $mesas = Mesa::all()->pluck('nombre', 'id');

        return view('meseros.edit', compact('mesero', 'mesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meseros  $meseros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meseros $mesero)
    {
        // Guardar cambios del edit
        $data = request()->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'telefono' => 'required|min:',
            'correo' => 'required',
            'mesas' => 'required'
        ]);

        Meseros::where('id', $mesero->id)->update([
            'nombre' => $data['nombre'],
            'edad' => $data['edad'],
            'telefono' => $data['telefono'],
            'correo' => $data['correo'],
            'mesa_asignada' => $data['mesas']
        ]);

        return redirect(route('meseros.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meseros  $meseros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meseros $mesero)
    {
        // Eliminar un mesero
        $mesero->delete();

        return redirect(route('meseros.index'));
    }
}

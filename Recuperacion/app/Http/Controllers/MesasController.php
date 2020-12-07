<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listado de mesas
        $mesas = Mesa::all();

        return view('mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Agregar una mesa
        return view('mesas.create');
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
            'nombre' => 'required|min:6'
        ]);

        Mesa::create([
            'nombre' => $data['nombre']
        ]);

        return redirect(route('mesas.index'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        // Mostrar un mesa
        return view('mesas.show', compact('mesa'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        // Editar una mesa
        return view('mesas.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        // Guardar cambios del edit
        $data = request()->validate([
            'nombre' => 'required|min:6'
        ]);

        Mesa::where('id', $mesa->id)->update([
            'nombre' => $data['nombre']
        ]);

        return redirect(route('mesas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        // Eliminar una mesa
        $mesa->delete();

        return redirect(route('mesas.index'));
    }
}

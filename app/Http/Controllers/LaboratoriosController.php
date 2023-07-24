<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Laboratorios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaboratoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $laboratorios = Laboratorios::all();
        return view('Institucion.Laboratorios.Index', compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departamento = Departamento::all();
        return view('Institucion.Laboratorios.Agregar', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Clave' => 'required',
            'Nombre' => 'required',
            'Siglas' => ' required',
            'Departamento' => 'required'
        ]);

        $laboratorios = Laboratorios::create([
            'Clave' => $request->Clave,
            'Nombre' => $request->Nombre,
            'Siglas' => $request->Siglas,
            'Departamento' => $request->Departamento
        ]);

        return redirect('/Laboratorios')->with('success','Laboratorio agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorios $laboratorios)
    {
        //
        return view('Institucion.Laboratorios.Show', compact('laboratorios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorios $laboratorios)
    {
        //
        $departamento = Departamento::all();
        return view('Institucion.Laboratorios.Editar', compact('laboratorios','departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratorios $laboratorios)
    {
        //
        $request->validate([
            'Clave' => 'required',
            'Nombre' => 'required',
            'Siglas' => ' required',
            'Departamento' => 'required'
        ]);

        $laboratorios->update([
            'Clave' => $request->Clave,
            'Nombre' => $request->Nombre,
            'Siglas' => $request->Siglas,
            'Departamento' => $request->Departamento
        ]);

        return redirect('/Laboratorios')->with('success','Laboratorio actualizado exitosamente');

    }

    public function eliminar(Laboratorios $laboratorios){
        //
        return view('Institucion.Laboratorios.Eliminar', compact('laboratorios'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratorios $laboratorios)
    {
        //
        $laboratorios->delete();
        return redirect('/Laboratorios')->with('success','Laboratorio eliminado exitosamente');
    }
}

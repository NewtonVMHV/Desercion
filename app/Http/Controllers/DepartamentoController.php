<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:departamento-list|departamento-create|departamento-edit|departamento-delete', ['only' => ['index','store']]);
        $this->middleware('permission:departamento-create', ['only' => ['create','store']]);
        $this->middleware('permission:departamento-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:departamento-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departamento = Departamento::all();
        return view('Institucion.Departamento.Index',compact('departamento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Institucion.Departamento.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ClaveDep'=>'required',
            'DepDepende'=>'required',
            'Nombre'=>'required',
            'Nivel'=>'required',
            'Tipo'=>'required'
        ]);

        $departamento = Departamento::create([
            'ClaveDep'=>$request->ClaveDep,
            'DepDepende'=>$request->DepDepende,
            'Nombre'=>$request->Nombre,
            'Nivel'=>$request->Nivel,
            'Tipo'=>$request->Tipo
        ]);

        return redirect('/Departamento')->with('success','Departamento creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        //
        return view('Institucion.Departamento.Detalles', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        //
        return view('Institucion.Departamento.Editar', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
        $request->validate([
            'ClaveDep'=>'required',
            'DepDepende'=>'required',
            'Nombre'=>'required',
            'Nivel'=>'required',
            'Tipo'=>'required'
        ]);

        $departamento->update([
            'ClaveDep'=>$request->ClaveDep,
            'DepDepende'=>$request->DepDepende,
            'Nombre'=>$request->Nombre,
            'Nivel'=>$request->Nivel,
            'Tipo'=>$request->Tipo
        ]);

        return redirect('/Departamento')->with('success','Departamento actualizado exitosamente');
    }

    public function eliminar(Departamento $departamento){

        return view('Institucion.Departamento.Eliminar', compact('departamento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        //
        $departamento->delete();
        return redirect('/Departamento')->with('success','Departamento eliminado exitosamente');
    }
}

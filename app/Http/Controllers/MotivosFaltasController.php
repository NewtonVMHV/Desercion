<?php

namespace App\Http\Controllers;

use App\Models\MotivosFaltas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotivosFaltasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:motivos-list|motivos-create|motivos-edit|motivos-delete', ['only' => ['index','store']]);
        $this->middleware('permission:motivos-create', ['only' => ['create','store']]);
        $this->middleware('permission:motivos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:motivos-delete', ['only' => ['eliminar','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $motivosFaltas = MotivosFaltas::all();
        return view('Gestiones.Motivos.Index',compact('motivosFaltas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Gestiones.Motivos.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Motivo' => 'required',
            'Estatus' => 'required'
        ]);

        $motivosFaltas = MotivosFaltas::create([
            'Motivo'=> $request->Motivo,
            'Estatus'=> $request->Estatus
        ]);

        return redirect('/Motivos')->with('success','Motivo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(MotivosFaltas $motivosFaltas)
    {
        //
        return view('Gestiones.Motivos.Detalles', compact('motivosFaltas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MotivosFaltas $motivosFaltas)
    {
        //
        return view('Gestiones.Motivos.Editar', compact('motivosFaltas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MotivosFaltas $motivosFaltas)
    {
        //
        $request->validate([
            'Motivo' => 'required',
            'Estatus' => 'required'
        ]);

        $motivosFaltas->update([
            'Motivo'=> $request->Motivo,
            'Estatus'=> $request->Estatus
        ]);

        return redirect('/Motivos')->with('success','Motivo actualizado exitosamente');
    }

    public function eliminar(MotivosFaltas $motivosFaltas){

        return view('Gestiones.Motivos.Eliminar', compact('motivosFaltas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MotivosFaltas $motivosFaltas)
    {
        //
        $motivosFaltas->delete();
        return redirect('/Motivos')->with('success','Motivo eliminado exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CicloEscolarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:periodo-list|periodo-create|periodo-edit|periodo-delete', ['only' => ['index','store']]);
        $this->middleware('permission:periodo-create', ['only' => ['create','store']]);
        $this->middleware('permission:periodo-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:periodo-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cicloEscolar = CicloEscolar::all();
        return view('Gestiones.Periodo.Index', compact('cicloEscolar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Gestiones.Periodo.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Periodo'=>'required',
            'Anio'=>'required',
            'Nombre'=>'required',
            'Inicio'=>'required',
            'Termino'=>'required',
            'estatus' => 'required'
        ]);

        $cicloEscolar = CicloEscolar::create([
            'Periodo'=>$request->Periodo,
            'Anio'=>$request->Anio,
            'Nombre'=>$request->Nombre,
            'Inicio'=>$request->Inicio,
            'Termino'=>$request->Termino,
            'Estatus' => $request->estatus
        ]);

        return redirect('/Periodo')->with('success','Periodo creado exitisamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(CicloEscolar $cicloEscolar)
    {
        //
        return view('Gestiones.Periodo.Detalles', compact('cicloEscolar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CicloEscolar $cicloEscolar)
    {
        //
        return view('Gestiones.Periodo.Editar', compact('cicloEscolar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CicloEscolar $cicloEscolar)
    {
        //
        $request->validate([
            'Periodo'=>'required',
            'Anio'=>'required',
            'Nombre'=>'required',
            'Inicio'=>'required',
            'Termino'=>'required',
            'estatus'=>'required'
        ]);

        $cicloEscolar->update([
            'Periodo'=>$request->Periodo,
            'Anio'=>$request->Anio,
            'Nombre'=>$request->Nombre,
            'Inicio'=>$request->Inicio,
            'Termino'=>$request->Termino,
            'Estatus' => $request->estatus
        ]);

        return redirect('/Periodo')->with('success','Periodo actualizado exitisamente');
    }

    public function eliminar(CicloEscolar $cicloEscolar){

        return view('Gestiones.Periodo.Eliminar', compact('cicloEscolar'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CicloEscolar $cicloEscolar)
    {
        //
        $cicloEscolar->delete();
        return redirect('/Periodo')->with('success','Periodo eliminado exitisamente');
    }
}

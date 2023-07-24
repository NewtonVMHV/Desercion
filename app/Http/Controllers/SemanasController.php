<?php

namespace App\Http\Controllers;

use App\Models\CicloEscolar;
use App\Models\Semanas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemanasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:semanas-list|semanas-create|semanas-edit|semanas-delete', ['only' => ['index','store']]);
        $this->middleware('permission:semanas-create', ['only' => ['create','store']]);
        $this->middleware('permission:semanas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:semanas-delete', ['only' => ['eliminar','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $semanas = Semanas::all();
        return view('Gestiones.Semanas.Index',compact('semanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $semanas = CicloEscolar::all();
        return view('Gestiones.Semanas.Agregar', compact('semanas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Semanas'=>'required',
            'Fecha_Inicio'=>'required',
            'Fecha_Termino'=>'required',
            'Inicio'=>'required',
            'Termino'=>'required',
            'Periodo'=>'required'
        ]);
        
        $semanas = Semanas::create([
            'Semanas'=>$request->Semanas,
            'Fecha_Inicio'=>$request->Fecha_Inicio,
            'Fecha_Termino'=>$request->Fecha_Termino,
            'Inicio'=>$request->Inicio,
            'Termino'=>$request->Termino,
            'Periodo'=>$request->Periodo
        ]);

        return redirect('/Fecha-del-Periodo')->with('success','Semana creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semanas $semanas)
    {
        //
        return view('Gestiones.Semanas.Detalles', compact('semanas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semanas $semanas)
    {
        //
        $semanasCiclo = CicloEscolar::all();
        return view('Gestiones.Semanas.Editar',compact('semanas','semanasCiclo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semanas $semanas)
    {
        //
        $request->validate([
            'Semanas'=>'required',
            'Fecha_Inicio'=>'required',
            'Fecha_Termino'=>'required',
            'Inicio'=>'required',
            'Termino'=>'required',
            'Periodo'=>'required'
        ]);
        
        $semanas->update([
            'Semanas'=>$request->Semanas,
            'Fecha_Inicio'=>$request->Fecha_Inicio,
            'Fecha_Termino'=>$request->Fecha_Termino,
            'Inicio'=>$request->Inicio,
            'Termino'=>$request->Termino,
            'Periodo'=>$request->Periodo
        ]);

        return redirect('/Fecha-del-Periodo')->with('success','Semana actualizado exitosamente');
    }

    public function eliminar(Semanas $semanas){

        return view('Gestiones.Semanas.Eliminar', compact('semanas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semanas $semanas)
    {
        //
        $semanas->delete();
        return redirect('/Fecha-del-Periodo')->with('success','Semana eliminado exitosamente');
    }
}

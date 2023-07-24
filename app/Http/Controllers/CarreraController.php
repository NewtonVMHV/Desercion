<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:carrera-list|carrera-create|carrera-edit|carrera-delete', ['only' => ['index','store']]);
        $this->middleware('permission:carrera-create', ['only' => ['create','store']]);
        $this->middleware('permission:carrera-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:carrera-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carrera = Carrera::all();
        return view('Institucion.Carreras.Index',compact('carrera'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Institucion.Carreras.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Interna'=>'required',
            'Clave_Oficial'=>'required',
            'Reticula'=>'required',
            'Nivel_Escolar'=>'required',
            'Modalidad'=>'required',
            'Nombre'=>'required',
            'Reducido'=>'required',
            'Siglas'=>'required',
            'Creditos'=>'required',
            'Maxima'=>'required',
            'Minima'=>'required'
        ]);

        $carrera = Carrera::create([
            'Interna'=>$request->Interna,
            'Clave_Oficial'=>$request->Clave_Oficial,
            'Reticula'=>$request->Reticula,
            'Nivel_Escolar'=>$request->Nivel_Escolar,
            'Modalidad'=>$request->Modalidad,
            'Nombre'=>$request->Nombre,
            'Reducido'=>$request->Reducido,
            'Siglas'=>$request->Siglas,
            'Creditos'=>$request->Creditos,
            'Maxima'=>$request->Maxima,
            'Minima'=>$request->Minima
        ]);

        return redirect('/Carrera')->with('success','Carrera creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
        return view('Institucion.Carreras.Detalles', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        //
        return view('Institucion.Carreras.Editar', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $request->validate([
            'Interna'=>'required',
            'Clave_Oficial'=>'required',
            'Reticula'=>'required',
            'Nivel_Escolar'=>'required',
            'Modalidad'=>'required',
            'Nombre'=>'required',
            'Reducido'=>'required',
            'Siglas'=>'required',
            'Creditos'=>'required',
            'Maxima'=>'required',
            'Minima'=>'required'
        ]);

        $carrera->update([
            'Interna'=>$request->Interna,
            'Clave_Oficial'=>$request->Clave_Oficial,
            'Reticula'=>$request->Reticula,
            'Nivel_Escolar'=>$request->Nivel_Escolar,
            'Modalidad'=>$request->Modalidad,
            'Nombre'=>$request->Nombre,
            'Reducido'=>$request->Reducido,
            'Siglas'=>$request->Siglas,
            'Creditos'=>$request->Creditos,
            'Maxima'=>$request->Maxima,
            'Minima'=>$request->Minima
        ]);

        return redirect('/Carrera')->with('success','Carrera actualizado exitosamente');

    }

    public function eliminar(Carrera $carrera){

        return view('Institucion.Carreras.Eliminar',compact('carrera'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        //
        $carrera->delete();
        return redirect('/Carrera')->with('success','Carrera eliminado exitosamente');
    }
}

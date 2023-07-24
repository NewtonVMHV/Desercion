<?php

namespace App\Http\Controllers;
use App\Models\Carrera;
use App\Models\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:materia-list|materia-create|materia-edit|materia-delete', ['only' => ['index','store']]);
        $this->middleware('permission:materia-create', ['only' => ['create','store']]);
        $this->middleware('permission:materia-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:materia-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materia = Materia::all();
        return view('Institucion.Materias.Index',compact('materia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $carrera = Carrera::all();
        return view('Institucion.Materias.Agregar', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ClaveMat'=>'required',
            'Nivel_Escolar'=>'required',
            'Nombre'=>'required',
            'TipoMateria'=>'required',
            'NombreAbreviado'=>'required',
            'Hora'=>'required',
            'carrera'=>'required',
            'Semestre'=>'required',
            'Unidades'=>'required'
        ]);

        $materia = Materia::create([
            'ClaveMat'=>$request->ClaveMat,
            'NivelEscolar'=>$request->Nivel_Escolar,
            'Nombre'=>$request->Nombre,
            'TipoMateria'=>$request->TipoMateria,
            'NombreAbreviado'=>$request->NombreAbreviado,
            'Creditos'=>$request->Hora,
            'carrera'=>$request->carrera,
            'Semestre'=>$request->Semestre,
            'Unidades'=>$request->Unidades
        ]);

        return redirect('/Materia')->with('success','Materia creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
        return view('Institucion.Materias.Detalles', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
        $carrera = Carrera::all();
        return view('Institucion.Materias.Editar',compact('materia','carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
        $request->validate([
            'ClaveMat'=>'required',
            'Nivel_Escolar'=>'required',
            'Nombre'=>'required',
            'TipoMateria'=>'required',
            'NombreAbreviado'=>'required',
            'Hora'=>'required',
            'carrera'=>'required',
            'Semestre'=>'required',
            'Unidades'=>'required'
        ]);

        $materia->update([
            'ClaveMat'=>$request->ClaveMat,
            'NivelEscolar'=>$request->Nivel_Escolar,
            'Nombre'=>$request->Nombre,
            'TipoMateria'=>$request->TipoMateria,
            'NombreAbreviado'=>$request->NombreAbreviado,
            'Creditos'=>$request->Hora,
            'carrera'=>$request->carrera,
            'Semestre'=>$request->Semestre,
            'Unidades'=>$request->Unidades
        ]);

        return redirect('/Materia')->with('success','Materia actualizado exitosamente');
    }

    public function eliminar(Materia $materia){

        return view('Institucion.Materias.Eliminar', compact('materia'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
        $materia->delete();
        return redirect('/Materia')->with('success','Materia eliminado exitosamente');
    }
}

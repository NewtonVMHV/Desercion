<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Carrera;
use App\Models\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:docente-list|docente-create|docente-edit|docente-delete', ['only' => ['index','store']]);
        $this->middleware('permission:docente-create', ['only' => ['create','store']]);
        $this->middleware('permission:docente-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:docente-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $personal = Personal::all();
        return view('Institucion.Docentes.Index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departamento = Departamento::all();
        $carrera = Carrera::all();
        return view('Institucion.Docentes.Agregar', compact('carrera','departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'RFC'=>'required',
            'Curp'=>'required',
            'Nombre'=>'required',
            'Apellidos'=>'required',
            'F_Nacimiento'=>'required',
            'Escolaridad'=>'required',
            'Estudios'=>'required',
            'estatus'=>'required',
            'carrera'=>'required',
            'departamento'=>'required'
        ]);

        $personal = Personal::create([
            'RFC'=>$request->RFC,
            'Curp'=>$request->Curp,
            'Nombre'=>$request->Nombre,
            'Apellidos'=>$request->Apellidos,
            'F_Nacimiento'=>$request->F_Nacimiento,
            'Telefono'=>$request->Telefono,
            'Correo'=>$request->Correo,
            'Escolaridad'=>$request->Escolaridad,
            'Estudios'=>$request->Estudios,
            'estatus'=>$request->estatus,
            'carrera'=>$request->carrera,
            'departamento'=>$request->departamento
        ]);
        
        return redirect('/Docentes')->with('success','Docentes creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
        return view('Institucion.Docentes.Detalles',compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        //
        $departamento = Departamento::all();
        $carrera = Carrera::all();
        return view('Institucion.Docentes.Editar', compact('personal','carrera','departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        //
        $request->validate([
            'RFC'=>'required',
            'Curp'=>'required',
            'Nombre'=>'required',
            'Apellidos'=>'required',
            'F_Nacimiento'=>'required',
            'Escolaridad'=>'required',
            'Estudios'=>'required',
            'estatus'=>'required',
            'carrera'=>'required',
            'departamento'=>'required'
        ]);

        $personal->update([
            'RFC'=>$request->RFC,
            'Curp'=>$request->Curp,
            'Nombre'=>$request->Nombre,
            'Apellidos'=>$request->Apellidos,
            'F_Nacimiento'=>$request->F_Nacimiento,
            'Telefono'=>$request->Telefono,
            'Correo'=>$request->Correo,
            'Escolaridad'=>$request->Escolaridad,
            'Estudios'=>$request->Estudios,
            'estatus'=>$request->estatus,
            'carrera'=>$request->carrera,
            'departamento'=>$request->departamento
        ]);
        
        return redirect('/Docentes')->with('success','Docentes actualizado exitosamente');
    }

    public function eliminar(Personal $personal){

        return view('Institucion.Docentes.Eliminar',compact('personal'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        //
        $personal->delete();
        return redirect('/Docentes')->with('success','Docentes eliminado exitosamente');
    }
}

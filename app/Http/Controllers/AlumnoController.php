<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrera;

class AlumnoController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:alumno-list|alumno-create|alumno-edit|alumno-delete', ['only' => ['index','store']]);
        $this->middleware('permission:alumno-create', ['only' => ['create','store']]);
        $this->middleware('permission:alumno-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:alumno-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumno = Alumno::all();
        return view('Institucion.Alumnos.Index', compact('alumno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $carrera = Carrera::all();
        return view('Institucion.Alumnos.Agregar', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matricula' => 'required',
            'Curp'=>'required',
            'Nombre'=>'required',
            'A_Paterno'=>'required',
            'A_Materno'=>'required',
            'F_Nacimiento'=>'required',
            'estatus'=>'required',
            'carrera'=>'required',
            'Semestre'=>'required'
        ]);

        $alumno = Alumno::create([
            'matricula'=>$request->matricula,
            'Curp'=>$request->Curp,
            'Nombre'=>$request->Nombre,
            'A_Paterno'=>$request->A_Paterno,
            'A_Materno'=>$request->A_Materno,
            'F_Nacimiento'=>$request->F_Nacimiento,
            'Telefono'=>$request->Telefono,
            'Correo'=>$request->Correo,
            'estatus'=>$request->estatus,
            'carrera'=>$request->carrera,
            'Semestre'=>$request->Semestre
        ]);
        
        return redirect('/alumno')->with('success','Alumno creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
        return view('Institucion.Alumnos.Detalles', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
        $carrera = Carrera::all();
        return view('Institucion.Alumnos.Editar', compact('alumno','carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
        $request->validate([
            'matricula' => 'required',
            'Curp'=>'required',
            'Nombre'=>'required',
            'A_Paterno'=>'required',
            'A_Materno'=>'required',
            'F_Nacimiento'=>'required',
            'estatus'=>'required',
            'carrera'=>'required',
            'Semestre'=>'required'
        ]);

        $alumno->update([
            'matricula'=>$request->matricula,
            'Curp'=>$request->Curp,
            'Nombre'=>$request->Nombre,
            'A_Paterno'=>$request->A_Paterno,
            'A_Materno'=>$request->A_Materno,
            'F_Nacimiento'=>$request->F_Nacimiento,
            'Telefono'=>$request->Telefono,
            'Correo'=>$request->Correo,
            'estatus'=>$request->estatus,
            'carrera'=>$request->carrera,
            'Semestre'=>$request->Semestre
        ]);
        return redirect('/alumno')->with('success','Alumno actualizado exitosamente');
    }

    public function eliminar(Alumno $alumno){
        
        return view('Institucion.Alumnos.Eliminar', compact('alumno'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
        $alumno->delete();
        return redirect('/alumno')->with('success','Alumno eliminado exitosamente');

    }
}

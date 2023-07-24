<?php

namespace App\Http\Controllers;

use App\Models\Registro_Alumnos;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Alumno;
use App\Models\Laboratorios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class RegistroAlumnosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:registro-alumno-list|registro-alumno-create|registro-alumno-edit|registro-alumno-delete|registro-alumno-export', ['only' => ['index','store']]);
        $this->middleware('permission:registro-alumno-create', ['only' => ['create','store']]);
        $this->middleware('permission:registro-alumno-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:registro-alumno-delete', ['only' => ['eliminar','destroy','eliminarTabla']]);
        $this->middleware('permission:registro-alumno-export', ['only' => ['export']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registro_Alumnos = Registro_Alumnos::all();
        return view('Registros.Alumnos.Index', compact('registro_Alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $laboratorios = Laboratorios::all();
        $carrera = Carrera::all();
        $materia = Materia::all();
        return view('Registros.Alumnos.Agregar', compact('carrera','materia','laboratorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matricula'=>'required',
            'nombre'=>'required',
            'Hora' => 'required',
            'fecha'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'materia'=>'required',
            'laboratorio' => 'required'
        ]);

        $registro_Alumnos = Registro_Alumnos::create([
            'Matricula'=>$request->matricula,
            'Nombre'=>$request->nombre,
            'Hora'=>$request->Hora,
            'Fecha'=>$request->fecha,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Materia'=>$request->materia,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones
        ]);

        return redirect('/Registro-Alumno')->with('success','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro_Alumnos $registro_Alumnos)
    {
        //
        return view('Registros.Alumnos.Show', compact('registro_Alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro_Alumnos $registro_Alumnos)
    {
        //
        $laboratorios = Laboratorios::all();
        $carrera = Carrera::all();
        $materia = Materia::all();
        return view('Registros.Alumnos.Editar', compact('registro_Alumnos','carrera','materia','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro_Alumnos $registro_Alumnos)
    {
        //
        $request->validate([
            'matricula' => 'required',
            'nombre'=>'required',
            'Hora' => 'required',
            'fecha'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'materia'=>'required',
            'laboratorio' => 'required'
        ]);

        $registro_Alumnos->update([
            'Matricula'=>$request->matricula,
            'Nombre'=>$request->nombre,
            'Hora' => $request->Hora,
            'Fecha'=>$request->fecha,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Materia'=>$request->materia,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones,
        ]);

        return redirect('/Registro-Alumno')->with('success','Registro actualizado exitosamente');
    }
    public function eliminar(Registro_Alumnos $registro_Alumnos)
    {
        //
        return view('Registros.Alumnos.Eliminar', compact('registro_Alumnos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro_Alumnos $registro_Alumnos)
    {
        //
        $registro_Alumnos->delete();
        return redirect('/Registro-Alumno')->with('success','Registro eliminado exitosamente');
    }

    public function eliminarTabla(Request $request){
        $registro_Alumnos = Registro_Alumnos::query()->delete();
        return redirect('/Registro-Alumno')->with('success','Tabla limpia de manera exitosamente');
    }

    public function export(Request $request){
        $registro_Alumnos = Registro_Alumnos::all();
        $pdf = PDF::loadView('Registros.Alumnos.Exportar',compact('registro_Alumnos'))->setPaper('a4', 'landscape');
        return $pdf->download('Alumnos.pdf');
    }

    public function autocomplete(Request $request){
        $searchMatricula = $_GET['matricula'];
        $valores = array();
        $valores['existe'] = 0;

        $resultados = Alumno::where('matricula',$searchMatricula)->get();
        
        if (isset($_GET['buscar'])) {
            foreach ($resultados as $consulta) {
                $valores['existe'] = "1";
                $valores['Nombre'] = $consulta['Nombre'];
                $valores['A_Paterno'] = $consulta['A_Paterno'];
                $valores['A_Materno'] = $consulta['A_Materno'];	
            }

            sleep(1);
            return  response()->json($valores);
        }
    }    

}

<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Carrera;
use App\Models\CicloEscolar;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CalificacionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:calificaciones-list|calificaciones-create|calificaciones-edit|calificaciones-delete', ['only' => ['index','store','autocomplete']]);
        $this->middleware('permission:calificaciones-create', ['only' => ['create','store']]);
        $this->middleware('permission:calificaciones-edit', ['only' => ['edit','editar','update']]);
        $this->middleware('permission:calificaciones-delete', ['only' => ['eliminar','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $AlumnoCarrera = $request->carrera;
        $AlumnoSemestre = $request->Semestre;
        $MateriaNombre = $request->Materia;

        $carrera = Carrera::all();

        $alumnos = DB::select('select carreras.siglas, materias.Nombre, alumnos.id, alumnos.matricula, concat(alumnos.a_paterno," ",alumnos.a_materno," ",alumnos.nombre) as alumno from alumnos, materias, carreras
        where alumnos.carrera = ? and materias.carrera = ?
        and materias.Nombre = ? and materias.Semestre = ?
        and alumnos.Semestre = ? and alumnos.estatus = "0" ORDER BY alumnos.a_paterno ASC' ,
        [
            $AlumnoCarrera,
            $AlumnoCarrera,
            $MateriaNombre,
            $AlumnoSemestre,
            $AlumnoSemestre
        ]);
        return view('Calificaciones.Index', compact('alumnos','carrera'));
    }

    public function autocomplete(){
        $carrera = $_GET['carrera'];
        $semestre = $_GET['semestre'];
        
        $resultados = Materia::where('carrera',$carrera)->where('semestre',$semestre)->get();
        $options = "";
        foreach ($resultados as $consulta) {
            $options .= "<option value=\"$consulta[Nombre]\">$consulta[Nombre]</option>";
        }

        sleep(1);
        return response()->json($options);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Alumno $alumno)
    {
        //
        $docentes = Personal::all();
        $cicloEscolar = CicloEscolar::where('Estatus','0')->get();
        return view('Calificaciones.Calificaciones', compact('alumno','cicloEscolar','docentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cicloEscolar' => 'required',
            'unidades' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',
            'matricula' => 'required',
            'nombre' => 'required',
            'Docentes' => 'required',
            'Materia' => 'required',
            'calificacion' => 'required'
        ]);

        $calificaciones = Calificaciones::create([
            'CicloEscolar' => $request->cicloEscolar,
            'Unidades' => $request->unidades,
            'Carrera' => $request->carrera,
            'Semestre' => $request->semestre,
            'Matricula' => $request->matricula,
            'Nombre' => $request->nombre,
            'Docente' => $request->Docentes,
            'Materia' => $request->Materia,
            'Calificacion' => $request->calificacion
        ]);

        return redirect('/Calificaciones')->with('success','Calificación enviado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $buscar = $request->buscar;
        $carrera = Carrera::all();
        $calificaciones = DB::select('select * from calificaciones where calificaciones.Matricula = ?',
        [
            $buscar
        ]);
        return view('Calificaciones.Editar',compact('calificaciones','carrera'));
    }

    public function editar(Calificaciones $calificaciones){
        $docentes = Personal::all();
        $cicloEscolar = CicloEscolar::where('Estatus','0')->get();
        return view('Calificaciones.Actualizar',compact('calificaciones','cicloEscolar','docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calificaciones $calificaciones)
    {
        //

        $request->validate([
            'cicloEscolar' => 'required',
            'unidades' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',
            'matricula' => 'required',
            'nombre' => 'required',
            'Docentes' => 'required',
            'Materia' => 'required',
            'calificacion' => 'required'
        ]);

        $calificaciones->update([
            'CicloEscolar' => $request->cicloEscolar,
            'Unidades' => $request->unidades,
            'Carrera' => $request->carrera,
            'Semestre' => $request->semestre,
            'Matricula' => $request->matricula,
            'Nombre' => $request->nombre,
            'Docente' => $request->Docentes,
            'Materia' => $request->Materia,
            'Calificacion' => $request->calificacion
        ]);

        return redirect('/Calificaciones/Editar')->with('success','Calificación actualizado exitosamente');
    }

    public function eliminar(Calificaciones $calificaciones){

        return view('Calificaciones.Eliminar', compact('calificaciones'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calificaciones $calificaciones)
    {
        //
        $calificaciones->delete();
        return redirect('/Calificaciones/Editar')->with('success','Calificación eliminado exitosamente');
    }
}

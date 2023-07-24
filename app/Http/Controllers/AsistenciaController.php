<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Carrera;
use App\Models\Alumno;
use App\Models\Semanas;
use App\Models\MotivosFaltas;
use App\Models\CicloEscolar;
use App\Models\Personal;
use DB;
use App\Models\Asistencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
   //

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:inasistencia-list|inasistencia-create|inasistencia-edit|inasistencia-delete', ['only' => ['index','store','autocomplete']]);
        $this->middleware('permission:inasistencia-create', ['only' => ['create','store']]);
        $this->middleware('permission:inasistencia-edit', ['only' => ['edit','editar','update']]);
        $this->middleware('permission:inasistencia-delete', ['only' => ['eliminar','destroy']]);
    }
    
    public function index(Request $request){

        $AlumnoCarrera = $request->carrera;
        $AlumnoSemestre = $request->Semestre;
        $MateriaNombre = $request->Materia;

        $materia = Materia::all();
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
        return view('Asistencia.Index', compact('alumnos','carrera','materia'));
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

    public function create(Request $request, Alumno $alumno){
        $motivos = MotivosFaltas::all();
        $asistencia = Asistencia::all();
        $semana = Semanas::all();
        $docentes = Personal::all();
        $cicloEscolar = CicloEscolar::where('Estatus','0')->get();
        return view('Asistencia.Inasistencia', compact('alumno','motivos','asistencia','semana','cicloEscolar','docentes'));
    }

    public function store(Request $request){

        $request->validate([
            'cicloEscolar' => 'required',
            'carrera'=>'required',
            'semestre'=>'required',
            'semana'=>'required',
            'matricula'=>'required',
            'nombre'=>'required',
            'Materia'=>'required',
            'Docentes' => 'required',
            'inasistencia'=>'required',
            'motivo' => 'required'
        ]);

        $asistencia = Asistencia::create([
            'CicloEscolar' => $request->cicloEscolar,
            'Carrera' => $request->carrera,
            'Semestre' => $request->semestre,
            'Semana' => $request->semana,
            'Matricula' => $request->matricula,
            'NombreCompleto' => $request->nombre,
            'Materia' => $request->Materia,
            'Docente' => $request->Docentes,
            'Inasistencia' => $request->inasistencia,
            'Motivo' => $request->motivo
        ]);

        return redirect('/Asistencias')->with('success','Inasistencias enviado exitosamente');
    }

    public function edit(Request $request){
        $buscar = $request->buscar;
        $carrera = Carrera::all();
        $asistencia = DB::select('select * from asistencias where asistencias.Matricula = ?',
        [
            $buscar
        ]);
        return view('Asistencia.Editar',compact('asistencia','carrera'));
    }

    public function editar(Asistencia $asistencia){
        $motivos = MotivosFaltas::all();
        $semana = Semanas::all();
        $docentes = Personal::all();
        $cicloEscolar = CicloEscolar::where('Estatus','0')->get();
        return view('Asistencia.Actualizar',compact('asistencia','motivos','semana','cicloEscolar','docentes'));
    }

    public function update(Request $request, Asistencia $asistencia){
        $request->validate([
            'cicloEscolar' => 'required',
            'carrera'=>'required',
            'semestre'=>'required',
            'semana'=>'required',
            'matricula'=>'required',
            'nombre'=>'required',
            'Materia'=>'required',
            'Docentes' => 'required',
            'inasistencia'=>'required',
            'motivo' => 'required'
        ]);

        $asistencia->update([
            'CicloEscolar' => $request->cicloEscolar,
            'Carrera' => $request->carrera,
            'Semestre' => $request->semestre,
            'Semana' => $request->semana,
            'Matricula' => $request->matricula,
            'NombreCompleto' => $request->nombre,
            'Materia' => $request->Materia,
            'Docente'=>$request->Docentes,
            'Inasistencia' => $request->inasistencia,
            'Motivo' => $request->motivo
        ]);

        return redirect('/Asistencia/Editar')->with('success','Inasistencias actualizada exitosamente');
    }

    public function eliminar(Asistencia $asistencia){

        return view('Asistencia.Eliminar', compact('asistencia'));
    }

    public function destroy(Asistencia $asistencia){
        $asistencia->delete();
        return redirect('/Asistencia/Editar')->with('success','Inasistencia eliminada exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Personal;
use App\Models\Materia;
use App\Models\Carrera;
use App\Models\Asistencia;
use App\Models\Calificaciones;
use App\Models\Departamento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alumnoActivos = Alumno::where('estatus','0')->get()->count();
        $docente = Personal::where('estatus','0')->get()->count();
        $materia = Materia::all()->count();
        $carrera = Carrera::all()->count();
        $departamento = Departamento::all()->count();

        $alumno = Alumno::where('estatus','1')->get();

        $motivos = Asistencia::select(DB::raw("COUNT(*) as count"), DB::raw("Motivo as motivo"))->groupBy(DB::raw("motivo"))->orderBy('id','ASC')->pluck('count', 'motivo');
        $labels = $motivos->keys();
        $data = $motivos->values();

        $calificacionesReprobadas = Calificaciones::select(DB::raw("COUNT(*) as count"), DB::raw("Carrera as carrera"))->where('calificacion','<=','69')->groupBy(DB::raw("carrera"))->orderBy('id','ASC')->pluck('count', 'carrera');
        $labelsReprobada = $calificacionesReprobadas->keys();
        $dataReprobada = $calificacionesReprobadas->values();

        $calificacionesAprobadas = Calificaciones::select(DB::raw("COUNT(*) as count"), DB::raw("Carrera as carrera"))->where('calificacion','>=','70')->groupBy(DB::raw("carrera"))->orderBy('id','ASC')->pluck('count', 'carrera');
        $labelsAprobada = $calificacionesAprobadas->keys();
        $dataAprobada = $calificacionesAprobadas->values();

        return view('home',compact('alumno','alumnoActivos','docente','materia','carrera','departamento','labels','data','labelsReprobada','dataReprobada','labelsAprobada','dataAprobada'));
    }
}

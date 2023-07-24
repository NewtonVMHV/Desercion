<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Calificaciones;
use App\Models\Carrera;
use App\Models\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertaController extends Controller
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
        $this->middleware('permission:alerta-inasistencia-filter|alerta-inasistencia-edit|alerta-inasistencia-delete', ['only' => ['Inasistencia']]);
        $this->middleware('permission:alerta-inasistencia-filter', ['only' => ['Filter']]);
        $this->middleware('permission:alerta-inasistencia-edit', ['only' => ['editarSeguimiento','updateSeguimiento']]);
        $this->middleware('permission:alerta-inasistencia-delete', ['only' => ['eliminarSeguimiento','destroySeguimiento']]);
        $this->middleware('permission:alerta-calificaciones-filter|alerta-calificaciones-edit|alerta-calificaciones-delete', ['only' => ['calificaciones']]);
        $this->middleware('permission:alerta-calificaciones-filter', ['only' => ['FilterCalificaciones']]);
        $this->middleware('permission:alerta-calificaciones-edit', ['only' => ['editarSeguimientoCalificacion','updateSeguimientoCalificacion']]);
        $this->middleware('permission:alerta-calificaciones-delete', ['only' => ['eliminarSeguimientoCalificacion','destroySeguimientoCalificaciones']]);
    }

    public function Inasistencia(){
        $inasistencia = Asistencia::where('Inasistencia','>=',2)->get();
        $carrera = Carrera::all();
        $materia = Materia::all();
        return view('Alerta.Inasistencia.Index', compact('inasistencia','carrera','materia'));
    }

    public function Filter(Request $request){
        $carrera = $request->carrera;
        $semestre = $request->semestre;
        $materia = $request->materia;
        $inasistencia = $request->inasistencia;

        $inasistencia = Asistencia::where('Carrera','LIKE','%'.$carrera.'%')->
                                    where('Semestre','LIKE','%'.$semestre.'%')->
                                    where('Materia','LIKE','%'.$materia.'%')->
                                    where('Inasistencia','LIKE','%'.$inasistencia.'%')->get();

        return view('Alerta.Inasistencia.Filter',compact('inasistencia'));
    }

    public function editarSeguimiento(Asistencia $asistencia){

        return view('Alerta.Inasistencia.Editar', compact('asistencia'));
    }

    public function updateSeguimiento(Request $request, Asistencia $asistencia){
        $request->validate([
            'estatus' => 'required'
        ]);

        $asistencia->update([
            'Estatus' => $request->estatus
        ]);
        return redirect('/Alerta-Temprana')->with('success','Alerta actualizado exitosamente');
    }

    public function eliminarSeguimiento(Asistencia $asistencia){

        return view('Alerta.Inasistencia.Eliminar', compact('asistencia'));
    }

    public function destroySeguimiento(Asistencia $asistencia){
        $asistencia->delete();
        return redirect('/Alerta-Temprana')->with('success','Alerta eliminado exitosamente');
    }

    public function calificaciones(){
        $carrera = Carrera::all();
        $materia = Materia::all();
        $calificaciones = Calificaciones::where('Calificacion','<=','69')->get();
        return view('Alerta.Calificaciones.Index',compact('calificaciones','carrera','materia'));
    }

    public function FilterCalificaciones(Request $request){
        $carrera = $request->carrera;
        $semestre = $request->semestre;
        $materia = $request->materia;

        $calificaciones = Calificaciones::where('Carrera','LIKE','%'.$carrera.'%')->
                                        where('Semestre','LIKE','%'.$semestre.'%')->
                                        where('Materia','LIKE','%'.$materia.'%')->get();

        return view('Alerta.Calificaciones.Filter',compact('calificaciones'));
    }

    public function editarSeguimientoCalificacion(Calificaciones $calificaciones){
        
        return view('Alerta.Calificaciones.Editar',compact('calificaciones'));
    }

    public function updateSeguimientoCalificacion(Request $request, Calificaciones $calificaciones){
        $request->validate([
            'estatus' => 'required'
        ]);

        $calificaciones->update([
            'Estatus' => $request->estatus
        ]);
        return redirect('/Alerta-Temprana/Calificaciones')->with('success','Alerta actualizado exitosamente');
    }

    public function eliminarSeguimientoCalificacion(Calificaciones $calificaciones){

        return view('Alerta.Calificaciones.Eliminar', compact('calificaciones'));
    }

    public function destroySeguimientoCalificaciones(Calificaciones $calificaciones){
        $calificaciones->delete();
        return redirect('/Alerta-Temprana/Calificaciones')->with('success','Alerta eliminado exitosamente');
    }

}

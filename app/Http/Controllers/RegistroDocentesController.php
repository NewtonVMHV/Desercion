<?php

namespace App\Http\Controllers;

use App\Models\Registro_Docentes;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Laboratorios;
use App\Models\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class RegistroDocentesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:registro-docente-list|registro-docente-create|registro-docente-edit|registro-docente-delete|registro-docente-export', ['only' => ['index','store']]);
        $this->middleware('permission:registro-docente-create', ['only' => ['create','store']]);
        $this->middleware('permission:registro-docente-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:registro-docente-delete', ['only' => ['eliminar','destroy','eliminarTabla']]);
        $this->middleware('permission:registro-docente-export', ['only' => ['export']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registro_docentes = Registro_Docentes::all();
        return view('Registros.Docentes.Index', compact('registro_docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $carrera = Carrera::all();
        $materia = Materia::all();
        $laboratorios = Laboratorios::all();
        return view('Registros.Docentes.Agregar', compact('carrera','materia','laboratorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'RFC'=>'required',
            'nombre'=>'required',
            'Hora' => 'required',
            'fecha'=>'required',
            'numero'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'materia'=>'required',
            'laboratorio' => 'required'
        ]);

        $registro_docentes = Registro_Docentes::create([
            'RFC'=>$request->RFC,
            'Nombre'=>$request->nombre,
            'Hora' => $request->Hora,
            'Fecha'=>$request->fecha,
            'Numero'=>$request->numero,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Materia'=>$request->materia,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones
        ]);
        return redirect('/Registro-Docente')->with('success','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro_Docentes $registro_Docentes)
    {
        //
        return view('Registros.Docentes.Show', compact('registro_Docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro_Docentes $registro_Docentes)
    {
        //
        $laboratorios = Laboratorios::all();
        $carrera = Carrera::all();
        $materia = Materia::all();
        return view('Registros.Docentes.Editar',compact('registro_Docentes', 'carrera','materia','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro_Docentes $registro_Docentes)
    {
        //
        $request->validate([
            'RFC'=>'required',
            'nombre'=>'required',
            'Hora'=>'required',
            'fecha'=>'required',
            'numero'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'materia'=>'required',
            'laboratorio' => 'required'
        ]); 

        $registro_Docentes->update([
            'RFC'=>$request->RFC,
            'Nombre'=>$request->nombre,
            'Hora'=>$request->Hora,
            'Fecha'=>$request->fecha,
            'Numero'=>$request->numero,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Materia'=>$request->materia,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones
        ]);

        return redirect('/Registro-Docente')->with('success','Registro actualizado exitosamente');
    }

    public function eliminar(Registro_Docentes $registro_Docentes)
    {
        //
        return view('Registros.Docentes.Eliminar',compact('registro_Docentes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro_Docentes $registro_Docentes)
    {
        //
        $registro_Docentes->delete();
        return redirect('/Registro-Docente')->with('success','Registro eliminado exitosamente');
    }

    public function eliminarTabla(Request $request){
        $registro_Docentes = Registro_Docentes::query()->delete();
        return redirect('/Registro-Docente')->with('success','Tabla limpia de manera exitosamente');
    }

    public function export(Request $request){
        $registro_Docentes = Registro_Docentes::all();
        $pdf = PDF::loadView('Registros.Docentes.Exportar',compact('registro_Docentes'))->setPaper('a4', 'landscape');
        return $pdf->download('Docentes.pdf');
    }

    public function autocomplete(Request $request){
        $searchRFC = $_GET['RFC'];
        $valores = array();
        $valores['existe'] = 0;

        $resultados = Personal::where('RFC',$searchRFC)->get();
        
        if (isset($_GET['buscar'])) {
            foreach ($resultados as $consulta) {
                $valores['existe'] = "1";
                $valores['Nombre'] = $consulta['Nombre'];
                $valores['Apellidos'] = $consulta['Apellidos'];
            }

            sleep(1);
            return  response()->json($valores);
        }
    }    
}

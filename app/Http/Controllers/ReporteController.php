<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Alumno;
use App\Models\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class ReporteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:reporte-list|reporte-create|reporte-edit|reporte-delete|reporte-export', ['only' => ['index','store']]);
        $this->middleware('permission:reporte-create', ['only' => ['create','store']]);
        $this->middleware('permission:reporte-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:reporte-delete', ['only' => ['eliminar','destroy']]);
        $this->middleware('permission:reporte-export', ['only' => ['export']]);
    }

       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reporte = Reporte::all();
        return view('Gestiones.Reportes.Index',compact('reporte'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $docentes = Personal::all();
        return view('Gestiones.Reportes.Agregar', compact('docentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matricula' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',
            'fecha'=>'required',
            'responsable' => 'required',
            'mensaje'=>'required'
        ]);

        $reporte = Reporte::create([
            'matricula' => $request->matricula,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'carrera' => $request->carrera,
            'semestre' => $request->semestre,
            'fecha'=> $request->fecha,
            'mensaje'=>$request->mensaje,
            'nombreResponsable' => $request->responsable
        ]);

        return redirect('/Reportes')->with('success','Reporte creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
        return view('Gestiones.Reportes.Detalles', compact('reporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
        $docentes = Personal::all();
        return view('Gestiones.Reportes.Editar',compact('reporte','docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
        $request->validate([
            'matricula' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',
            'fecha'=>'required',
            'responsable' => 'required',
            'mensaje'=>'required',
        ]);

        $reporte->update([
            'matricula' => $request->matricula,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'carrera' => $request->carrera,
            'semestre' => $request->semestre,
            'fecha'=> $request->fecha,
            'nombreResponsable' => $request->responsable,
            'mensaje'=>$request->mensaje
        ]);

        return redirect('/Reportes')->with('success','Reporte actualizado exitosamente');
    }

    public function eliminar(Reporte $reporte){

        return view('Gestiones.Reportes.Eliminar', compact('reporte'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
        $reporte->delete();
        return redirect('/Reportes')->with('success','Reporte eliminado exitosamente');
    }

    public function export(Request $request, Reporte $reporte){
        $pdf = PDF::loadView('Gestiones.Reportes.Exportar',compact('reporte'));
        return $pdf->download('Reporte.pdf');
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
                $valores['carrera'] = $consulta['carrera']; 
                $valores['Semestre'] = $consulta['Semestre']; 
            }

            sleep(1);
            return  response()->json($valores);
        }

    }
}

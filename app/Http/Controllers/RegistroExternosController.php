<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Laboratorios;
use App\Models\Registro_Externos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class RegistroExternosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:registro-externo-list|registro-externo-create|registro-externo-edit|registro-externo-delete|registro-externo-docente', ['only' => ['index','store']]);
        $this->middleware('permission:registro-externo-create', ['only' => ['create','store']]);
        $this->middleware('permission:registro-externo-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:registro-externo-delete', ['only' => ['eliminar','destroy','eliminarTabla']]);
        $this->middleware('permission:registro-externo-export', ['only' => ['export']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registro_Externos = Registro_Externos::all();
        return view('Registros.Externos.Index', compact('registro_Externos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $laboratorios = Laboratorios::all();
        $carrera = Carrera::all();
        return view('Registros.Externos.Agregar', compact('carrera','laboratorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'=>'required',
            'Hora'=>'required',
            'fecha'=>'required',
            'numero'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'laboratorio' => 'required'
        ]);

        $registro_Externos = Registro_Externos::create([
            'Nombre'=>$request->nombre,
            'Hora'=>$request->Hora,
            'Fecha'=>$request->fecha,
            'Numero'=>$request->numero,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones
        ]);
        return redirect('/Registro-Externo')->with('success','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro_Externos $registro_Externos)
    {
        //
        return view('Registros.Externos.Show', compact('registro_Externos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro_Externos $registro_Externos)
    {
        //
        $laboratorios = Laboratorios::all();
        $carrera = Carrera::all();
        return view('Registros.Externos.Editar',compact('registro_Externos', 'carrera','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro_Externos $registro_Externos)
    {
        //
        $request->validate([
            'nombre'=>'required',
            'hora'=>'required',
            'fecha'=>'required',
            'numero'=>'required',
            'actividad'=>'required',
            'carrera'=>'required',
            'laboratorio' => 'required'
        ]); 

        $registro_Externos->update([
            'Nombre'=>$request->nombre,
            'Hora'=>$request->Hora,
            'Fecha'=>$request->fecha,
            'Numero'=>$request->numero,
            'Actividad'=>$request->actividad,
            'Carrera'=>$request->carrera,
            'Laboratorio' => $request->laboratorio,
            'Observaciones'=>$request->observaciones,
        ]);

        return redirect('/Registro-Externo')->with('success','Registro actualizado exitosamente');
    }

    public function eliminar(Registro_Externos $registro_Externos){

        return view('Registros.Externos.Eliminar', compact('registro_Externos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro_Externos $registro_Externos)
    {
        //
        $registro_Externos->delete();
        return redirect('/Registro-Externo')->with('success','Registro eliminado exitosamente');
    }

    public function eliminarTabla(Request $request){
        $registro_Externos = Registro_Externos::query()->delete();
        return redirect('/Registro-Externo')->with('success','Tabla limpia de manera exitosamente');
    }

    public function export(Request $request){
        $registro_Externos = Registro_Externos::all();
        $pdf = PDF::loadView('Registros.Externos.Exportar',compact('registro_Externos'))->setPaper('a4', 'landscape');
        return $pdf->download('Externos.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calificaciones;
use App\Models\Carrera;
use App\Models\Materia;
use DB;

class BoletaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:Muestra-Calificaciones-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $searchMatricula = $request->Matricula;
        $calificaciones = DB::select('select * from calificaciones where calificaciones.Matricula = ?',
        [
            $searchMatricula
        ]);
        return view('Gestiones.Boleta.Index',compact('calificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
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
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        //
        return view('Perfiles.Index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('Perfiles.Editar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        
        $user->update([
           'name'=>$request->nombre,
           'usuario'=>$request->usuario,
           'email'=>$request->email,
           'telefono'=>$request->telefono,
           'biografia'=>$request->biografia,
           'genero'=>$request->genero,
           'fecha_nacimiento'=>$request->fecha_nacimiento,
           'educacion'=>$request->educacion,
           'nivel_educativo'=>$request->nivel_educativo,
           'experiencia'=>$request->experiencia,
           'anio_experiencia'=>$request->anio
        ]);

        return redirect('/Perfil')->with('success','Perfil actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

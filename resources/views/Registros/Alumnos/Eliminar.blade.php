@extends('layouts.sliderbar')
@section('content')
<section class="container">
    <div class="card">
        <form action="{{ route('registro_alumno.destroy',$registro_Alumnos) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-header">
                <h3>Eliminar Registro #{{ $registro_Alumnos->id }}</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $registro_Alumnos->Nombre }}</h5>
                <p class="card-text text-center">¿Deseas eliminar este registro?</p>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-danger">Eliminar Registro</button>
                    <a href="{{ route('registro_alumno') }}" class="btn btn-dark" >Volver al inicio</a>
                </div>
            </div>
        </form>
      </div>
</section>
@endsection
@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('registro_alumno') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del registro de laboratorios #{{ $registro_Alumnos->id }}</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Nombre: </strong> {{ $registro_Alumnos->Nombre }}</p>
                <p><strong>Materia: </strong> {{ $registro_Alumnos->Materia }}</p>
                <p><strong>Carrera: </strong> {{ $registro_Alumnos->Carrera }}</p>
                <p><strong>Hora: </strong>{{ $registro_Alumnos->Hora}}</p>
                <p><strong>Laboratorio: </strong>{{ $registro_Alumnos->Laboratorio }}</p>
            </div>
            <div class="col">
                <p><strong>Matricula: </strong>{{ $registro_Alumnos->Matricula }}</p>
                <p><strong>Fecha: </strong> {{ $registro_Alumnos->Fecha }}</p>
                <p><strong>Actividad: </strong> {{ $registro_Alumnos->Actividad }}</p>
                <p>{{ $registro_Alumnos->Observaciones }}</p>
            </div>
        </div>
    </section>
@endsection
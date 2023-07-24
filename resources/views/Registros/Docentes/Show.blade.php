@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('registro_docente') }}"><i class='bx bx-chevron-left-circle'></i></a>Detalles del registro #{{ $registro_Docentes->id }}</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Nombre del docente: </strong> {{ $registro_Docentes->Nombre }}</p>
                <p><strong>Materia: </strong> {{ $registro_Docentes->Materia }}</p>
                <p><strong>Carrera: </strong> {{ $registro_Docentes->Carrera }}</p>
                <p><strong>Hora: </strong>{{ $registro_Docentes->Hora}}</p>
                <p><strong>Laboratorio: </strong>{{ $registro_Docentes->Laboratorio }}</p>
            </div>
            <div class="col">
                <p><strong>RFC: </strong> {{ $registro_Docentes->RFC }}</p>
                <p><strong>Fecha: </strong> {{ $registro_Docentes->Fecha }}</p>
                <p><strong>Actividad: </strong> {{ $registro_Docentes->Actividad }}</p>
                <p><strong>Número de alumnos: </strong> {{ $registro_Docentes->Numero }}</p>
                <p>{{ $registro_Docentes->Observaciones }}</p>
            </div>
        </div>
    </section>
@endsection
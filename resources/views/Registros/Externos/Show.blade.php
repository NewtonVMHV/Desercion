@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('externo') }}"><i class='bx bx-chevron-left-circle'></i></a>Detalles del registro #{{ $registro_Externos->id }}</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Nombre: </strong>{{ $registro_Externos->Nombre }}</p>
                <p><strong>Carrera: </strong>{{ $registro_Externos->Carrera }}</p>
                <p><strong>Actividad: </strong> {{ $registro_Externos->Actividad }}</p>
                <p><strong>Hora: </strong> {{ $registro_Externos->Hora }}</p>
            </div>
            <div class="col">
                <p><strong>Laboratorio: </strong>{{ $registro_Externos->Laboratorio }}</p>
                <p><strong>Fecha: </strong> {{ $registro_Externos->Fecha }}</p>
                <p><strong>Número de alumnos: </strong> {{ $registro_Externos->Numero }}</p>
                <p>{{ $registro_Externos->Observaciones }}</p>
            </div>
        </div>
    </section>
@endsection
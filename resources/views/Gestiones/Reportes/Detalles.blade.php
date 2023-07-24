@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('reporte') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Reporte</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Matricula: </strong> {{ $reporte->matricula }}</p>
                <p><strong>Nombre: </strong> {{ $reporte->nombre }}</p>
                <p><strong>Apellidos: </strong> {{ $reporte->apellidos }}</p>
                <p><strong>Carrera: </strong> {{ $reporte->carrera }}</p>
                <p><strong>Semestre: </strong> {{ $reporte->semestre }}</p>
            </div>
            <div class="col">
                <p><strong>Fecha de la solicitud: </strong> {{ $reporte->fecha }}</p>
                <p><strong>Nombre del Tutor: </strong> {{ $reporte->nombreResponsable }}</p>
                <p><strong>Mensaje: </strong> {{ $reporte->mensaje }}</p>
            </div>
        </div>
    </section>
@endsection
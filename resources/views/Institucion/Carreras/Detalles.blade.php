@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('carrera') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Carrera</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Interna: </strong>{{ $carrera->Interna }}</p>
                <p><strong>Clave Oficial: </strong> {{ $carrera->Clave_Oficial }}</p>
                <p><strong>Reticula: </strong> {{ $carrera->Reticula }}</p>
                <p><strong>Nivel Escolar: </strong> {{ $carrera->Nivel_Escolar }}</p>
                <p><strong>Modalidad: </strong> {{ $carrera->Modalidad }}</p>
            </div>
            <div class="col">
                <p><strong>Nombre de la carrera: </strong> {{ $carrera->Nombre }}</p>
                <p><strong>Nombre reducido: </strong> {{ $carrera->Reducido }}</p>
                <p><strong>Siglas: </strong> {{ $carrera->Siglas }}</p>
                <p><strong>Creditos: </strong> {{ $carrera->Creditos }}</p></p>
                <p><strong>Máxima: </strong> {{ $carrera->Maxima }}</p>
                <p><strong>Mínima: </strong> {{ $carrera->Minima }}</p>
            </div>
        </div>
    </section>
@endsection
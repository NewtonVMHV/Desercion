@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('laboratorio') }}"><i class='bx bx-chevron-left-circle'></i></a> Detalles del Laboratorio</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><Strong>Clave del laboratorio: </Strong> {{ $laboratorios->Clave }}</p>
                <p><strong>Nombre: </strong> {{ $laboratorios->Nombre }}</p>
            </div>
            <div class="col">
                <p><strong>Siglas: </strong> {{ $laboratorios->Siglas }}</p>
                <p><strong>Departamento: </strong> {{ $laboratorios->Departamento }}</p>
            </div>
        </div>
    </section>
@endsection
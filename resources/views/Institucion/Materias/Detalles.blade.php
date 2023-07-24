@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('materia') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Materia</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Clave de materia: </strong> {{ $materia->ClaveMat }}</p>
                <p><strong>Nivel Escolar: </strong> {{ $materia->NivelEscolar }}</p>
                <p><strong>Nombre de la materia: </strong> {{ $materia->Nombre }}</p>
                <p><strong>Tipo de materia: </strong> {{ $materia->TipoMateria }}</p>
                <p><strong>Nombre Abreviado: </strong> {{ $materia->NombreAbreviado }}</p>
            </div>
            <div class="col">
                <p><strong>Carrera: </strong> {{ $materia->carrera }}</p>
                <p><strong>Créditos: </strong>{{ $materia->Hora }}</p>
                <p><strong>Semestre: </strong> {{ $materia->Semestre }}</p>
                <p><strong>Unidades: </strong> {{ $materia->Unidades }}</p>
            </div>
        </div>
    </section>
@endsection
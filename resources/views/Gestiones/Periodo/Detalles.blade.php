@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('periodo') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Periodo</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Periodo: </strong> {{ $cicloEscolar->Periodo }}</p>
                <p><strong>Año: </strong> {{ $cicloEscolar->Anio }}</p>
                <p><strong>Nombre: </strong> {{ $cicloEscolar->Nombre }}</p>
            </div>
            <div class="col">
                <p><strong>Fecha de Inicio: </strong> {{ $cicloEscolar->Inicio }}</p>
                <p><strong>Fecha de Termino: </strong> {{ $cicloEscolar->Termino }}</p>
                <p><strong>Estatus: </strong> 
                    @if ($cicloEscolar->Estatus == '0')
                        Activo
                    @else
                        @if ($cicloEscolar->Estatus == '1')
                            Inactivo
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection
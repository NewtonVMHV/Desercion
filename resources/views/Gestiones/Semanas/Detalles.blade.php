@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('semana') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Fecha de la semana</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Semana: </strong> {{ $semanas->Semanas }}</p>
                <p><strong>Fecha de Inicio: </strong> {{ $semanas->Fecha_Inicio }}</p>
                <p><strong>Fecha de Termino: </strong> {{ $semanas->Fecha_Termino }}</p>
            </div>
            <div class="col">
                <p><strong>Fecha de Inicio (Date): </strong> {{ $semanas->Inicio }}</p>
                <p><strong>Fecha de Termino (Date): </strong> {{ $semanas->Termino }}</p>
                <p><strong>Periodo: </strong> {{ $semanas->Periodo }}</p>
            </div>
        </div>
    </section>    
@endsection
@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('docente') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Docente</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>RFC: </strong> {{ $personal->RFC }}</p>
                <p><strong>Curp: </strong> {{ $personal->Curp }}</p>
                <p><strong>Nombre: </strong> {{ $personal->Nombre }}</p>
                <p><strong>Apellidos: </strong> {{ $personal->Apellidos }}</p>
                <p><strong>Fecha de Nacimiento: </strong> {{ $personal->F_Nacimiento }}</p>
                <p><Strong>Estatus: </Strong>
                    @if ($personal->estatus == '0')
                        Activo
                    @else
                        @if ($personal->estatus == '1')
                            Inactivo
                        @endif
                    @endif
                </p>
            </div>
            <div class="col">
                <p><strong>Correo Electrónico: </strong> {{ $personal->Correo }}</p>
                <p><strong>Escolaridad: </strong> {{ $personal->Escolaridad }}</p>
                <p><strong>Estudios: </strong> {{ $personal->Estudios }}</p>
                <p><strong>Carrera: </strong> {{ $personal->carrera }}</p>
                <p><strong>Departamento: </strong> {{ $personal->departamento }}</p>
            </div>
        </div>
    </section>
@endsection
@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('alumno') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Alumno</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Matricula: </strong> {{ $alumno->matricula }}</p>
                <p><strong>Curp: </strong> {{ $alumno->Curp }}</p>
                <p><strong>Nombre: </strong> {{ $alumno->Nombre }}</p>
                <p><strong>Apellido Paterno: </strong> {{ $alumno->A_Paterno }}</p>
                <p><strong>Apellido Materno: </strong> {{ $alumno->A_Materno }}</p>
            </div>
            <div class="col">  
                <p><strong>Carrera: </strong> {{ $alumno->carrera }}</p>
                <p><strong>Semestre: </strong> {{ $alumno->Semestre }}</p>
                <p><strong>Correo Electrónico: </strong>{{ $alumno->Correo }}</p>
                <p><strong>Telefono: </strong> {{ $alumno->Telefono }}</p>
                <p><Strong>Estatus: </Strong>
                    @if ($alumno->estatus == '0')
                        Activo
                    @else
                        @if ($alumno->estatus == '1')
                            Inactivo
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection
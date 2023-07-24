@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Seguimiento</h2>
        <hr>
        <form action="{{ route('Alerta-Inasistencia.updateSeguimiento',$asistencia) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Periodo</label>
                    <input type="text" class="form-control" id="cicloEscolar" name="cicloEscolar" value="{{ $asistencia->CicloEscolar }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Semana</label>
                    <input type="text" class="form-control" id="semana" name="semana" value="{{ $asistencia->Semana }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" value="{{ $asistencia->Carrera }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Semestre</label>
                    <input type="text" class="form-control" id="semestre" name="semestre" value="{{ $asistencia->Semestre }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $asistencia->Matricula }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $asistencia->NombreCompleto }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Materia</label>
                    <input type="text" class="form-control" id="Materia" name="Materia" value="{{ $asistencia->Materia }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Docente</label>
                    <input type="text" class="form-control" id="Docente" name="Docente" value="{{ $asistencia->Docente }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Inasistencia</label>
                    <input type="text" class="form-control" id="inasistencia" name="inasistencia" value="{{ $asistencia->Inasistencia }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Motivo</label>
                    <input type="text" class="form-control" id="motivo" name="motivo" value="{{ $asistencia->Motivo }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Estatus</label>
                    <select class="form-select" name="estatus" aria-label="Default select example" required>
                        <option selected>{{ $asistencia->Estatus }}</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Trabajo">En Trabajo</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar seguimiento</button>
                <a href="{{ route('Alerta-Inasistencia') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
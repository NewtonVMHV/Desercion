@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Seguimiento</h2>
        <hr>
        <form action="{{ route('Alerta-Inasistencia.updateSeguimientoCalificacion',$calificaciones) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Periodo</label>
                    <input type="text" class="form-control" id="cicloEscolar" name="cicloEscolar" value="{{ $calificaciones->CicloEscolar }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Unidades</label>
                    <input type="text" class="form-control" id="unidades" name="unidad" value="{{ $calificaciones->Unidades }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" value="{{ $calificaciones->Carrera }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Semestre</label>
                    <input type="text" class="form-control" id="semestre" name="semestre" value="{{ $calificaciones->Semestre }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $calificaciones->Matricula }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $calificaciones->Nombre }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Docente</label>
                    <input type="text" class="form-control" id="Docente" name="Docente" value="{{ $calificaciones->Docente }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Materia</label>
                    <input type="text" class="form-control" id="materia" name="materia" value="{{ $calificaciones->Materia }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Calificación</label>
                    <input type="number" class="form-control" id="calificacion" name="calificacion" value="{{ $calificaciones->Calificacion }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Estatus</label>
                    <select class="form-select" name="estatus" aria-label="Default select example" required>
                        <option selected>{{ $calificaciones->Estatus }}</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Trabajo">En Trabajo</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Seguimiento</button>
                <a href="{{ route('Alerta-Calificaciones') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
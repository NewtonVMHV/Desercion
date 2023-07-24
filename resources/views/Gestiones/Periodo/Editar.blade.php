@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Periodo <div class="float-end"> {{ Auth::user()->name }}</div></h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('periodo.update',$cicloEscolar) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label for="periodo" class="form-label is-required">Selecciona el periodo</label>
                    <select class="form-select" aria-label="Default select example" name="Periodo" name="Periodo" required>
                        <option selected>{{ $cicloEscolar->Periodo }}</option>
                        <option value="Periodo 1">Periodo 1</option>
                        <option value="Periodo 2">Periodo 2</option>
                        <option value="Periodo 3">Periodo 3</option>
                    </select>
                </div>
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="Nombre" placeholder="Ej. Agosto-Diciembre 2020" value="{{ $cicloEscolar->Nombre }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="inicio" class="form-label is-required">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="inicio" name="Inicio" value="{{ $cicloEscolar->Inicio }}" required>
                </div>
                <div class="col">
                    <label for="termino" class="form-label is-required">Fecha de Termino</label>
                    <input type="date" class="form-control" id="termino" name="Termino" value="{{ $cicloEscolar->Termino }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="anio" class="form-label is-required">Año</label>
                    <input type="text" class="form-control" id="anio" name="Anio" placeholder="Ej. 2020" value="{{ $cicloEscolar->Anio }}" required>
                </div>
                <div class="col">
                    <label for="estatus" class="form-label is-required">Estatus</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" id="estatus" name="estatus" {{ $cicloEscolar->Estatus == '0'?'checked':'' }}>
                        <label class="form-check-label" for="flexCheckDefault">
                            Activo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="estatus" name="estatus" {{ $cicloEscolar->Estatus == '1'?'checked':'' }}>
                        <label class="form-check-label" for="flexCheckChecked">
                            Inactivo
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Periodo</button>
                <a href="{{ route('periodo') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
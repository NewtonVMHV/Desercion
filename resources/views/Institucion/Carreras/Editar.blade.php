@extends('layouts.sliderbar');
@section('content')
    <section class="container">
        <h2>Editar Carrera <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
        <form action="{{ route('carrera.update',$carrera) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label for="interna" class="form-label is-required">Interna</label>
                    <input type="number" class="form-control" id="interna" name="Interna" value="{{ $carrera->Interna }}" maxlength="5" required>
                </div>
                <div class="col">
                    <label for="clave_oficial" class="form-label is-required">Clave Oficial</label>
                    <input type="number" class="form-control" id="clave_oficial" name="Clave_Oficial" value="{{ $carrera->Clave_Oficial }}" maxlength="15" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Nivel_Escolar" class="form-label is-required">Selecciona el nivel escolar</label>
                    <select name="Nivel_Escolar" class="form-select" aria-label="Default select example" required>
                        <option selected>{{ $carrera->Nivel_Escolar }}</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Postgrado">Postgrado</option>
                    </select>
                </div>
                <div class="col">
                    <label for="reticula" class="form-label is-required">Reticula</label>
                    <input type="text" class="form-control" id="reticula" name="Reticula" value="{{ $carrera->Reticula }}" maxlength="5" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="modalidad" class="form-label is-required">Selecciona la modalidad</label>
                    <select name="Modalidad" class="form-select" aria-label="Default select example" required>
                        <option selected>{{ $carrera->Modalidad }}</option>
                        <option value="Modalidad Mixta">Modalidad Mixta</option>
                        <option value="Modalidad Escolarizada">Modalidad Escolarizada</option>
                    </select>
                </div>
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $carrera->Nombre }}" maxlength="45" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="reducido" class="form-label is-required">Reducido</label>
                    <input type="text" class="form-control" id="reducido" name="Reducido" value="{{ $carrera->Reducido }}" maxlength="20" required>
                </div>
                <div class="col">
                    <label for="siglas" class="form-label is-required">Siglas</label>
                    <input type="text" class="form-control" id="siglas" name="Siglas" value="{{ $carrera->Siglas }}" maxlength="5" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="creditos" class="form-label is-required">Creditos</label>
                    <input type="number" class="form-control" id="creditos" name="Creditos" value="{{ $carrera->Creditos }}" required>
                </div>
                <div class="col">
                    <label for="maxima" class="form-label is-required">Maxima</label>
                    <input type="number" class="form-control" id="maxima" name="Maxima" value="{{ $carrera->Maxima }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="minima" class="form-label is-required">Minima</label>
                    <input type="number" class="form-control" id="minima" name="Minima" value="{{ $carrera->Minima }}" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Carrera</button>
                <a href="{{ route('carrera') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
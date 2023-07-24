@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Laboratorio</h2>
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
        <form action="{{ route('laboratorio.update',$laboratorios) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label for="Clave" class="form-label is-required">Clave de laboratorio</label>
                    <input type="text" class="form-control" id="Clave" name="Clave" value="{{ $laboratorios->Clave }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Nombre" class="form-label is-required">Nombre de laboratorio</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $laboratorios->Nombre }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Siglas" class="form-label is-required">Siglas</label>
                    <input type="text" class="form-control" id="Siglas" name="Siglas" value="{{ $laboratorios->Siglas }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Departamento" class="form-label is-required">Selecciona el Departamento</label>
                    <select class="form-select" aria-label="Default select example" name="Departamento" required>
                        <option>{{ $laboratorios->Departamento }}</option>
                        @foreach ($departamento as $item)
                            <option value="{{ $item->Nombre }}">{{ $item->Nombre }}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Laboratorio</button>
                <a href="{{ route('laboratorio') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
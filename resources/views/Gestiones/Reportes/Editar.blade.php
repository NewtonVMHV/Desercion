@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Reporte <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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

        <form action="{{ route('reporte.update',$reporte) }}" method="post">
            @csrf
            @method('put')

            <div class="row mb-3">
                <div class="col">
                    <label for="matricula" class="form-label is-required">Matricula</label>
                    <div class="input-group">	
                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="999999999" maxlength="9" value="{{ $reporte->matricula }}" required>
                        <span class="input-group-text"><i class='bx bx-search-alt'></i></span>
                    </div>
                </div>
                <div class="col">
                    <label for="fecha" class="form-label is-required">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $reporte->fecha }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $reporte->nombre }}" required>
                </div>
                <div class="col">
                    <label for="apellidos" class="form-label is-required">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $reporte->apellidos }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="carrera" class="form-label is-required">Carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" value="{{ $reporte->carrera }}" required>
                </div>
                <div class="col">
                    <label for="semestre" class="form-label is-required">Semestre</label>
                    <input type="text" class="form-control" id="semestre" name="semestre" value="{{ $reporte->semestre }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="responsable" class="form-label is-required">Nombre del Tutor</label>
                    <input type="text" class="form-control" list="tutores" id="responsable" name="responsable" value="{{ $reporte->nombreResponsable }}" required>
                    <datalist id="tutores">
                        @foreach ($docentes as $item)
                            <option value="{{ $item->Nombre }} {{ $item->Apellidos }}">{{ $item->Nombre }} {{ $item->Apellidos }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label is-required" for="textAreaExample6">Mensaje</label>
                        <textarea class="form-control" id="textAreaExample6" rows="3" name="mensaje" required>{{ $reporte->mensaje }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Reporte</button>
                <a href="{{ route('reporte') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
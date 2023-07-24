@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Agregar Docente <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
        <form action="{{ route('docente.store') }}" method="post">
            @csrf
            <div class=" row mb-3">
                <div class="col">
                    <label for="rfc" class="form-label is-required">RFC</label>
                    <input type="text" class="form-control" id="rfc" name="RFC" maxlength="13" required>
                </div>
                <div class="col">
                    <label for="curp" class="form-label is-required">Curp</label>
                    <input type="text" class="form-control" id="curp" name="Curp" maxlength="18" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="nombre" class="form-control" id="nombre" name="Nombre" required>
                </div>
                <div class="col">
                    <label for="Apellidos" class="form-label is-required">Apellidos</label>
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="F_Nacimiento" class="form-label is-required">Fecha de Nacimeiento</label>
                    <input type="date" class="form-control" id="F_Nacimiento" name="F_Nacimiento" required>
                </div>
                <div class="col">
                    <label for="Telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono" maxlength="10" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Correo" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="Correo" name="Correo">
                </div>
                <div class="col">
                    <label for="escolaridad" class="form-label is-required">Escolaridad</label>
                    <input class="form-control" list="datalistOptions" id="escolaridad" placeholder="Educación" name="Escolaridad" required>
                    <datalist id="datalistOptions">
                        <option value="Primaria">
                        <option value="Secundaria">
                        <option value="Preparatoria">
                        <option value="Universidad">
                        <option value="Maestría">
                        <option value="Doctorado">
                    </datalist>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="estudios" class="form-label is-required">Estudios</label>
                    <input type="text" class="form-control" id="estudios" name="Estudios" required>
                </div>
                <div class="col">
                    <label for="estatus" class="form-label is-required">Estatus</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" id="estatus" name="estatus" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Activo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="estatus" name="estatus">
                        <label class="form-check-label" for="flexCheckChecked">
                            Inactivo
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Selecciona la carrera</label>
                    <select name="carrera" class="form-select" aria-label="Default select example" required>
                        <option></option>
                        @foreach ($carrera as $item)
                        <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Selecciona el departamento</label>
                    <select name="departamento" class="form-select" aria-label="Default select example" required>
                        <option></option>
                        @foreach ($departamento as $item)
                        <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Agregar Docente</button>
                <a href="{{ route('docente') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
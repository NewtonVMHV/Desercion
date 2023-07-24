@extends('layouts.sliderbar');
@section('content')
    <section class="container">
        <h2>Editar Materia <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
        <form action="{{ route('materia.update',$materia) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col">
                    <label for="claveMat" class="form-label is-required">Clave de Materia</label>
                    <input type="number" class="form-control" id="claveMat" name="ClaveMat" value="{{ $materia->ClaveMat }}" maxlength="8" required>
                </div>
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $materia->Nombre }}" maxlength="30" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Nivel_Escolar" class="form-label is-required">Selecciona el nivel escolar</label>
                    <select name="Nivel_Escolar" class="form-select" aria-label="Default select example" required>
                        <option selected>{{ $materia->NivelEscolar }}</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Postgrado">Postgrado</option>
                    </select>
                </div>
                <div class="col">
                    <label for="TipoMateria" class="form-label is-required">Selecciona el tipo de materia</label>
                    <select name="TipoMateria" class="form-select" aria-label="Default select example" required>
                        <option selected>{{ $materia->TipoMateria }}</option>
                        <option value="Materia Curricular Base">Materia Curricular Base</option>
                        <option value="Materia Curricular Optativa">Materia Curricular Optativa</option>
                        <option value="Materia Curricular de Especialidad">Materia Curricular de Especialidad</option>
                        <option value="Materia Esxtra-Curricular">Materia Esxtra-Curricular</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="NombreAbeviado" class="form-label is-required">Nombre Abreviado</label>
                    <input type="text" class="form-control" id="NombreAbreviado" name="NombreAbreviado" value="{{ $materia->NombreAbreviado }}" maxlength="25" required>
                </div>
                <div class="col">
                    <label for="hora" class="form-label is-required">Créditos</label>
                    <input type="number" class="form-control" id="hora" name="Hora" value="{{ $materia->Creditos }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="col form-outline">
                        <label class="form-label is-required" for="form6Example3">Selecciona la carrera</label>
                        <select name="carrera" class="form-select" aria-label="Default select example" required>
                            <option selected>{{ $materia->carrera }}</option>
                            @foreach ($carrera as $item)
                            <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Selecciona el semestre</label>
                    <select name="Semestre" class="form-select" aria-label="Default select example" required>
                        <option selected>{{ $materia->Semestre }}</option>
                        <option value="Primer Semestre">Primer Semestre</option>
                        <option value="Segundo Semestre">Segundo Semestre</option>
                        <option value="Tercer Semestre">Tercer Semestre</option>
                        <option value="Cuarto Semestre">Cuarto Semestre</option>
                        <option value="Quinto Semestre">Quinto Semestre</option>
                        <option value="Sexto Semestre">Sexto Semestre</option>
                        <option value="Septimo Semestre">Septimo Semestre</option>
                        <option value="Octavo Semestre">Octavo Semestre</option>
                    </select>
                </div>
                <div class="col">
                    <label for="unidades" class="form-label is-required">Unidades</label>
                    <input type="number" class="form-control" id="unidades" name="Unidades" value="{{ $materia->Unidades }}" required>
                </div>
            </div>    
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar Materia</button>
                <a href="{{ route('materia') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
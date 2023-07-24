@extends('layouts.sliderbar')
@section('content')

<section class="container">
    <h2>Editar Alumno <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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

    <form action="{{ route('alumno.update',$alumno) }}" method="post">
        @csrf
        @method('put')
        <div class=" row mb-3">
            <div class="col">
                <label for="matricula" class="form-label is-required">Matricula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $alumno->matricula }}" maxlength="9" required>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona la carrera</label>
                <select name="carrera" class="form-select" aria-label="Default select example" required>
                    <option selected>{{ $alumno->carrera }}</option>
                    @foreach ($carrera as $item)
                    <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="curp" class="form-label is-required">Curp</label>
                <input type="text" class="form-control" id="curp" name="Curp" value="{{ $alumno->Curp }}" maxlength="18" required>
            </div>
            <div class="col">
                <label for="nombre" class="form-label is-required">Nombre</label>
                <input type="nombre" class="form-control" id="nombre" name="Nombre" value="{{ $alumno->Nombre }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="A_Paterno" class="form-label is-required">Apellido Paterno</label>
                <input type="text" class="form-control" id="A_Paterno" name="A_Paterno" value="{{ $alumno->A_Paterno }}" required>
            </div>
            <div class="col">
                <label for="A_Materno" class="form-label is-required">Apellido Materno</label>
                <input type="text" class="form-control" id="A_Materno" name="A_Materno" value="{{ $alumno->A_Materno }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="F_Nacimiento" class="form-label is-required">Fecha de Nacimeiento</label>
                <input type="date" class="form-control" id="F_Nacimiento" name="F_Nacimiento" value="{{ $alumno->F_Nacimiento }}" required>
            </div>
            <div class="col">
                <label for="Telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ $alumno->Telefono }}" maxlength="10">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona el semestre</label>
                <select name="Semestre" class="form-select" aria-label="Default select example" required>
                    <option selected>{{ $alumno->Semestre }}</option>
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
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Correo" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="Correo" name="Correo" value="{{ $alumno->Correo }}">
            </div>
            <div class="col">
                <label for="estatus" class="form-label is-required">Estatus</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" id="estatus" name="estatus" {{ $alumno->estatus == '0'?'checked':'' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        Activo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" id="estatus" name="estatus" {{ $alumno->estatus == '1'?'checked':'' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        Inactivo
                    </label>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Editar Alumno</button>
            <a href="{{ route('alumno') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
</section>
    
@endsection
@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Editar Registro</h2>
        <hr>
        <form action="{{ route('registro_alumno.update',$registro_Alumnos) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-4">
                <div class="col">
                    <label for="matricula" class="form-label is-required">Matricula</label>
                    <div class="input-group">	
                        <input type="text" class="form-control" name="matricula" id="matricula" maxlength="9" value="{{ $registro_Alumnos->Matricula }}" required>
                        <span class="input-group-text"><i class='bx bx-search-alt'></i></span>
                    </div>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Nombre completo</label>
                    <input type="text" name="nombre" class="form-control" placeholder="xxxxxxxxx" value="{{ $registro_Alumnos->Nombre }}" required/>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="Hora" class="form-label is-required">Selecciona la hora</label>
                    <input type="time" id="Hora" name="Hora" class="form-control" value="{{ $registro_Alumnos->Hora}}" required>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Fecha</label>
                    <input type="date" name="fecha" class="form-control" placeholder="xxxxxxxxx" value="{{ $registro_Alumnos->Fecha}}" required/>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Selecciona la actividad</label>
                    <select name="actividad" class="form-select" aria-label="Default select example" required>
                        <option>{{ $registro_Alumnos->Actividad}}</option>
                        <option value="Tarea">Tarea</option>
                        <option value="Investigación">Investigación</option>
                        <option value="Consultar">Consultar</option>
                        <option value="VideoConferencia">VideoConferencia</option>
                        <option value="Examen">Examen</option>
                        <option value="Clase">Clase</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="form6Example3">Selecciona la carrera</label>
                    <select name="carrera" class="form-select" aria-label="Default select example" required>
                        <option>{{ $registro_Alumnos->Carrera }}</option>
                        @foreach ($carrera as $item)
                            <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label is-required" for="exampleDataList">Materia</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" name="materia" placeholder="Escribe la materia..." value="{{ $registro_Alumnos->Materia }}">
                        <datalist id="datalistOptions">
                            @foreach ($materia as $item)
                                <option value="{{ $item->Nombre }}">
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="col">
                    <label class="form-label is-required" for="laboratorio">Selecciona el laboratorio</label>
                    <select name="laboratorio" class="form-select" aria-label="Default select example" required>
                        <option>{{ $registro_Alumnos->Laboratorio }}</option>
                        <option value="Desconocido">Desconocido</option>
                        @foreach ($laboratorios as $item)
                            <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example3">Observaciones</label>
                        <textarea class="form-control" name="observaciones" id="form6Example7" rows="4">{{ $registro_Alumnos->Observaciones }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Actualizar Registro</button>
                <a href="{{ route('registro_alumno') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
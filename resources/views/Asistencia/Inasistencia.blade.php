@extends('layouts.sliderbar')
@section('content')
<section class="container">
    <h2>Capturar Inasistencias <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
    <form action="{{ route('asistencia.store',$alumno) }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona el Periodo</label>
                <select name="cicloEscolar" class="form-select" aria-label="Default select example" required>
                    <option></option>
                    @foreach ($cicloEscolar as $item)
                        <option value="{{ $item->Nombre }}" selected>{{ $item->Nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Seleciona la Semana</label>
                <select name="semana" class="form-select" onblur="buscar_datos();" aria-label="Default select example" required>
                    <option></option>
                    @foreach ($semana as $item)
                        <option value="{{ $item->Semanas }}">{{ $item->Semanas }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Carrera</label>
                <input type="text" class="form-control" id="carrera" name="carrera" value="{{ $alumno->carrera }}" readonly required>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Semestre</label>
                <input type="text" class="form-control" id="semestre" name="semestre" value="{{ $alumno->Semestre }}" readonly required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Matricula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $alumno->matricula }}" readonly required>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $alumno->A_Paterno }} {{ $alumno->A_Materno }} {{ $alumno->Nombre }}" readonly required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="Docente" class="form-label is-required">Nombre del docente</label>  
                <input class="form-control" id="Docente" name="Docentes" value="{{ Auth::user()->name }}" readonly required>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona la Materia:</label>
                <select name="Materia" id="materia" class="form-select" aria-label="Default select example" required>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona la Inasistencia</label>
                <select name="inasistencia" class="form-select" aria-label="Default select example" required>
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona el Motivo</label>
                <select name="motivo" class="form-select" aria-label="Default select example" required>
                    <option></option>
                    @foreach ($motivos as $item)
                        <option value="{{ $item->Motivo }}">{{ $item->Motivo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Enviar Inasistencia</button>
            <a href="{{ route('asistencia') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function buscar_datos(){
            var carrera = $("#carrera").val();
            var semestre = $("#semestre").val();

            var parametros ={
                "carrera" : carrera,
                "semestre" : semestre
            }

            $.ajax({
            data:  parametros,
            dataType: 'json',
            url:   '/Calificaciones/Autocomplete',
            type:  'get',
            success:  function (options) {
                $("#materia").append(options);
            }
        }) 
    }
</script>
@endsection
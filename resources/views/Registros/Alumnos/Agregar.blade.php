@extends('layouts.sliderbar')
@section('content')
<section class="container">
    <h2>Agregar nuevo registro</h2>
    <hr>
    <div class="cargando row">       
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando...</span>
            </div>
        </div>
    </div>
    <div class="alert alert-danger" role="alert">
        Error
    </div>
    <div class="alert alert2 alert-danger" role="alert">
        El alumno no existe
    </div>
    <div class="alert alert3 alert-success" role="alert">
        El alumno existe, ¡Felicidades!
    </div>
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
    <form action="{{ route('registro_alumo.store') }}" method="post" class="formulario">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <label for="matricula" class="form-label is-required">Matricula</label>
                <div class="input-group">	
                    <input type="text" class="form-control" name="matricula" id="matricula" maxlength="9" onblur="buscar_datos();" required>
                    <span class="input-group-text"><i class='bx bx-search-alt'></i></span>
                </div>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="xxxxxxxxx" required/>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="Hora" class="form-label is-required">Selecciona la hora</label>
                <input type="time" id="Hora" name="Hora" class="form-control" required>
            </div>
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" placeholder="xxxxxxxxx" required/>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label class="form-label is-required" for="form6Example3">Selecciona la actividad</label>
                <select name="actividad" class="form-select" aria-label="Default select example" required>
                    <option></option>
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
                    <option></option>
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
                    <input class="form-control" list="datalistOptions" id="exampleDataList" name="materia" placeholder="Escribe la materia...">
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
                    <option></option>
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
                    <textarea class="form-control" name="observaciones" id="form6Example7" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Agregar Registro</button>
            <a href="{{ route('registro_alumno') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.cargando').hide();
        $('.alert').hide();
        $('.alert2').hide();
        $('.alert3').hide();
    });

    function buscar_datos(){
        matricula = $("#matricula").val();

        var parametros = {
            "buscar":1,
            "matricula":matricula
        }

        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10

        $.ajax({
            data: parametros,
            dataType:'json',
            url:'/Registro-Alumno/Autocomplete',
            type:'get',
            beforeSend: function() {
                $('.formulario').hide();
                $('.cargando').show();
                
            }, 
            error: function(){
                $('.alert').show();
            },
            complete: function() {
                $('.formulario').show();
                $('.cargando').hide();
            
            },
            success: function (valores){
                if (valores.existe == '1') {
                    $(".alert3").show();
                    $("#nombre").val(valores.Nombre+' '+valores.A_Paterno+' '+valores.A_Materno);
                    document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
                } else {
                    $(".alert2").show();
                }
            }
        })
    }

</script>
@endsection
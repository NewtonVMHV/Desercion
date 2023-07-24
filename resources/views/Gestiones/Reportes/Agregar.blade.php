@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Agregar Reporte <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
        <form action="{{ route('reporte.store') }}" method="post" class="formulario">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="matricula" class="form-label is-required">Matricula</label>
                    <div class="input-group">	
                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="999999999" maxlength="9" onblur="buscar_datos();" required>
                        <span class="input-group-text"><i class='bx bx-search-alt'></i></span>
                    </div>
                </div>
                <div class="col">
                    <label for="fecha" class="form-label is-required">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col">
                    <label for="apellidos" class="form-label is-required">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="carrera" class="form-label is-required">Carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" required>
                </div>
                <div class="col">
                    <label for="semestre" class="form-label is-required">Semestre</label>
                    <input type="text" class="form-control" id="semestre" name="semestre" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="responsable" class="form-label is-required">Nombre del Tutor</label>
                    <input type="text" class="form-control" list="tutores" id="responsable" name="responsable" required>
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
                        <textarea class="form-control" id="textAreaExample6" rows="3" name="mensaje" required></textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Agregar Reporte</button>
                <a href="{{ route('reporte') }}" class="btn btn-dark" >Volver al inicio</a>
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

        $.ajax({
            data: parametros,
            dataType:'json',
            url:'/Reportes/Autocomplete',
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
                    $("#nombre").val(valores.Nombre);
                    $('#apellidos').val(valores.A_Paterno+' '+valores.A_Materno);
                    $("#carrera").val(valores.carrera);
                    $("#semestre").val(valores.Semestre);
                } else {
                    $(".alert2").show();
                }
            }
        })
    }

</script>
@endsection
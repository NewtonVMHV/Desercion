@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Módulo para la Inasistencia <div class="float-end"> Editar Inasistencia <a href="{{ route('asistencia.edit') }}"><i class='bx bx-chevron-right-circle'></i></a></div></h2>
        <hr>
        <form class="container justify-content-center d-flex" role="search">
            <div class="row mb-1">
                <div class="col">
                    <select name="carrera" id="carrera" class="form-select" aria-label="Default select example">
                        <option selected>Selecciona la carrera</option>
                        @foreach ($carrera as $item)
                            <option value="{{$item->Nombre}}">{{$item->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="Semestre" id="semestre" class="form-select" aria-label="Default select example" onblur="buscar_datos();" required>
                        <option selected>Selecciona el semestre</option>
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
                    <select name="Materia" id="materia" class="form-select" aria-label="Default select example">
                        <option selected>Selecciona la materia</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success" type="submit"><i class='bx bx-search-alt'></i></button>
        </form>
        <hr>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <table id="tabla" class="table table-sm table-dark">
                <thead>
                  <tr>
                    <th scope="col">Carrera</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Inasistencia</th>
                  </tr>
                </thead>
                @foreach ($alumnos as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->siglas }}</td>
                            <td>{{ $item->matricula }}</td>
                            <td>{{ $item->alumno }}</td>
                            <td>
                                @can('inasistencia-create')
                                    <a class="btn btn-primary" href="{{ route('asistencia.create', $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Inasistencias"><i class='bx bx-check-double'></i></a>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
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
            url:   '/Asistencias/Autocomplete',
            type:  'get',
            success:  function (options) {
                $("#materia").append(options);
            }
        }) 
    }

    $('#tabla').DataTable({
        responsive:true,
        autowith:false,
        searching: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Ningún registro - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            "paginate": {
                "next":"Siguiente",
                "previous":"Anterior"
            }
        }
    });
</script>
@endsection
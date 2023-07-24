@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Modulo de Alerta Temprana-Calificaciones</h2>
        <hr>
        @can('alerta-calificaciones-filter')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Filter">
            <i class='bx bxs-filter-alt'></i> Filtrado
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="Filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtrado Avanzado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('Alerta-Inasistencia.FilterCalificaciones') }}">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Carreras">Selecciona la carrera</label>
                                    <select class="form-select" name="carrera" aria-label="Default select example">
                                        <option></option>
                                        @foreach ($carrera as $item)
                                            <option value="{{ $item->Nombre }}">{{ $item->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Semestre">Selecciona el semestre</label>
                                    <select class="form-select" name="semestre" aria-label="Default select example">
                                        <option></option>
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
                                    <label for="Materia" class="form-label">Escriba la materia</label>
                                    <input class="form-control" name="materia" list="datalistOptions" id="exampleDataList" placeholder="Escribe la materia">
                                    <datalist id="datalistOptions">
                                        @foreach ($materia as $item)
                                            <option value="{{ $item->Nombre }}">
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Filtrar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table id="tabla" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Acciones</th>
                    <th scope="col">#</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Alerta</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calificaciones as $item)
                    <tr>
                        <td>
                            @can('alerta-calificaciones-edit')
                                <a class="btn btn-primary" href="{{ route('Alerta-Inasistencia.editarSeguimientoCalificacion',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                            @endcan
                            @can('alerta-calificaciones-delete')
                                <a class="btn btn-danger" href="{{ route('Alerta-Inasistencia.eliminarSeguimientoCalificacion',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class='bx bxs-trash-alt' ></i>
                                </a>
                            @endcan
                        </td>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->Carrera }}</td>
                        <td>{{$item->Matricula}}</td>
                        <td>{{$item->Nombre}}</td>
                        <td>
                            @if ($item->Calificacion <= '69')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Alerta4">Alerta</button>
                            <!-- Modal -->
                            <div class="modal fade" id="Alerta4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alerta Roja</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>El alumno(a) {{ $item->Nombre }} de la carrera {{ $item->Carrera }} del {{ $item->Semestre }} semestre
                                            obtuvo una calificación reprobatoria de {{ $item->Calificacion }} en la materia {{ $item->Materia }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                        <td>
                            @if ($item->Estatus == 'Pendiente')
                                <span class="badge bg-danger">Pendiente</span>
                            @else
                                @if ($item->Estatus == 'En Trabajo')
                                    <span class="badge bg-warning text-dark">En Trabajo</span>
                                @else
                                    @if ($item->Estatus == 'Terminado')
                                        <span class="badge bg-success">Terminado</span>
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#tabla').DataTable({
        responsive:true,
        autowith:false,
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
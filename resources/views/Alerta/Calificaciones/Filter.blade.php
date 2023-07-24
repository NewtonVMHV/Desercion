@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2><a href="{{ route('Alerta-Calificaciones') }}"><i class='bx bx-chevron-left-circle'></i></a> Filtrado Avanzado de "Alerta Temprana Calificaciones"</h2>
        <hr>
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
                            <a class="btn btn-primary" href="{{ route('Alerta-Inasistencia.editarSeguimientoCalificacion',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="Eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Buen día, ¿Usted está seguro de eliminar este registro?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('Alerta-Inasistencia.destroySeguimientoCalificaciones',$item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
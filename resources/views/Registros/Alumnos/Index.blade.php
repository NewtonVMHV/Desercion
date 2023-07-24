@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Registro de laboratorios - Alumnos</h2>
        <hr>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            @can('registro-alumno-create')
                <a type="button" href="{{ route('registro_alumno.create') }}" class="btn btn-success">Agregar Registro</a>
            @endcan
            @can('registro-alumno-delete')
                <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#LimpiarTabla">Limpiar tabla</button>
                <!-- Modal -->
                <div class="modal fade" id="LimpiarTabla" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Buen día, ¿Usted está seguro de limpiar esta tabla?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <form action="{{ route('registro_alumno.eliminarTabla') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('registro-alumno-export')
                <a type="button" href="{{ route('registro_alumno.export') }}" class="btn btn-warning">Exportar</a>
            @endcan
        </div>
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
                    <th scope="col">Matricula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Laboratorio</th>
                </tr>
            </thead>
              <tbody>
               @foreach ($registro_Alumnos as $item)
                <tr>
                    <td style="width:15%;">
                        <a class="btn btn-info" href="{{ route('registro_alumno.show',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                        @can('registro-alumno-edit')
                            <a class="btn btn-primary" href="{{ route('registro_alumno.edit',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                        @endcan
                        @can('registro-alumno-delete')
                            <a class="btn btn-danger" href="{{ route('registro_alumno.eliminar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                        @endcan
                    </td>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->Matricula }}</td>
                    <td>{{$item->Nombre}}</td>
                    <td>{{$item->Hora}}</td>
                    <td>{{$item->Fecha}}</td>
                    <td>{{$item->Actividad}}</td>
                    <td>{{$item->Materia}}</td>
                    <td>{{$item->Carrera}}</td>
                    <td>{{ $item->Laboratorio }}</td>
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
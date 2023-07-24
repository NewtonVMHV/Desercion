@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2><a href="{{ route('calificaciones') }}"><i class='bx bx-chevron-left-circle'></i></a> Editar Calificaciones</h2>
        <hr>
        <form class="justify-content-center d-flex" role="search">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control form-control-lg rounded" name="buscar" placeholder="Ingrese la matricula"
                  aria-label="Type Keywords" aria-describedby="basic-addon2" />
                <span class="input-group-text border-0" id="basic-addon2"><i class='bx bx-search-alt'></i></span>
            </div>
        </form>
        <hr>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table id="tabla" class="table table-sm table-dark">
            <thead>
              <tr>
                <th scope="col">Acciones</th>
                <th scope="col">#</th>
                <th scope="col">Carrera</th>
                <th scope="col">Materia</th>
                <th scope="col">Matricula</th>
                <th scope="col">Nombre Completo</th>
              </tr>
            </thead>
            @foreach ($calificaciones as $item)
                <tbody>
                    <tr>
                        <td>
                            @can('calificaciones-edit')
                                <a class="btn btn-primary" href="{{ route('calificaciones.editar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                            @endcan
                            @can('calificaciones-delete')
                                <a class="btn btn-danger" href="{{ route('calificaciones.eliminar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <i class='bx bxs-trash-alt' ></i>
                                </a>
                            @endcan
                        </td>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->Carrera }}</td>
                        <td>{{ $item->Materia }}</td>
                        <td>{{ $item->Matricula }}</td>
                        <td>{{ $item->Nombre }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
<script type="text/javascript">
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
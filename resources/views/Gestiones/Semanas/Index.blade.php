@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Administración de Fechas <div class="float-end"> {{ Auth::user()->name }}</div></h2>
        <hr>
        @can('semanas-create')
            <a type="button" class="btn btn-light" href="{{ route('semana.create') }}">Agregar Fecha del Periodo <i class='bx bxs-user-plus'></i></a>
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
                    <th scope="col">Semana</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Termino</th>
                    <th scope="col">Inicio completo</th>
                    <th scope="col">Terminación completo</th>
                    <th scope="col">Periodo</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($semanas as $item)
            <tr>
                <td style="width:13%;">
                    <a class="btn btn-info" href="{{ route('semana.show',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                    @can('semanas-edit')
                        <a class="btn btn-primary" href="{{ route('semana.edit',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                    @endcan
                    @can('semanas-delete')
                        <a class="btn btn-danger" href="{{ route('semana.eliminar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                            <i class='bx bxs-trash-alt' ></i>
                        </a>
                    @endcan
                </td>
                <th scope="row">{{ $item->id }}</th>
                <td>{{$item->Semanas}}</td>
                <td>{{$item->Fecha_Inicio}}</td>
                <td>{{ $item->Fecha_Termino }}</td>
                <td>{{ $item->Inicio }}</td>
                <td>{{ $item->Termino }}</td>
                <td>{{ $item->Periodo }}</td>
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
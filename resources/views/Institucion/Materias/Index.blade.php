@extends('layouts.sliderbar');
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Módulo para Materias <div class="float-end"> {{ Auth::user()->name }}</div></h2>
        <hr>
        @can('materia-create')
            <a type="button" class="btn btn-light" href="{{ route('materia.create') }}">Agregar Materia <i class='bx bxs-user-plus'></i></a>
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
                    <th scope="col">Clave de materia</th>
                    <th scope="col">Nivel Escolar</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Tipo de Materia</th>
                    <th scope="col">Nombre Abreviado</th>
                    <th scope="col">Creditos</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Unidades</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($materia as $item)
            <tr>
                <td style="width:13%;">
                    <a class="btn btn-info" href="{{ route('materia.show',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles"><i class='bx bx-low-vision'></i></a>
                    @can('materia-edit')
                        <a class="btn btn-primary" href="{{ route('materia.edit',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class='bx bxs-edit'></i></a>
                    @endcan
                    @can('materia-delete')
                        <a class="btn btn-danger" href="{{ route('materia.eliminar',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                            <i class='bx bxs-trash-alt' ></i>
                        </a>
                    @endcan
                </td>
                <th scope="row">{{ $item->id }}</th>
                <td>{{$item->ClaveMat}}</td>
                <td>{{$item->NivelEscolar}}</td>
                <td>{{$item->Nombre}}</td>
                <td>{{ $item->carrera }}</td>
                <td>{{$item->TipoMateria}}</td>
                <td>{{$item->NombreAbreviado}}</td>
                <td>{{$item->Creditos}}</td>
                <td>{{ $item->Semestre }}</td>
                <td>{{ $item->Unidades }}</td>
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
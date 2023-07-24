@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container">
        <h2>Muestra de Calificaciones</h2>
        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#calificacionesModal">
        Búsqueda por Matricula <i class='bx bx-search' ></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="calificacionesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="search">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Búsqueda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Carreras">Ingrese la matricula</label>
                                    <input class="form-control" name="Matricula" id="matricula" placeholder="Ingrese la matricula">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Búsqueda</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <table id="tabla" class="table table-sm table-dark">
            <thead>
                <tr>
                    <th scope="col">Asiganatura</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Unidad 1</th>
                    <th scope="col">Unidad 2</th>
                    <th scope="col">Unidad 3</th>
                    <th scope="col">Unidad 4</th>
                    <th scope="col">Unidad 5</th>
                    <th scope="col">Unidad 6</th>
                    <th scope="col">Unidad 7</th>
                    <th scope="col">Unidad 8</th>
                    <th scope="col">Unidad 9</th>
                    <th scope="col">Unidad 10</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calificaciones as $item)
                    <tr>
                        <td>{{ $item->Materia }}</td>
                        <td>{{ $item->Nombre }}</td>
                        <td>
                            @if ($item->Unidades == 'Primera Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Segunda Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Tercera Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Cuarta Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Quinta Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Sexta Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Septima Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Octava Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Novena Unidad')
                                {{ $item->Calificacion }}
                            @endif
                        </td>
                        <td>
                            @if ($item->Unidades == 'Decima Unidad')
                                {{ $item->Calificacion }}
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
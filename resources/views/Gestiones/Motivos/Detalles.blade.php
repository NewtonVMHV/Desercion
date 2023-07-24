@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('motivo') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Motivo Faltante</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Motivo: </strong> {{ $motivosFaltas->Motivo }}</p>
            </div>
            <div class="col">
                <p><strong>Estatus: </strong>
                    @if ($motivosFaltas->Estatus == '0')
                        Activo
                    @else
                        @if ($motivosFaltas->Estatus == '1')
                            Inactivo
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection
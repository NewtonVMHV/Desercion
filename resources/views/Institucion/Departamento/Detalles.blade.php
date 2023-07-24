@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2><a href="{{ route('departamento') }}"><i class='bx bx-chevron-left-circle'></i></a> Mostrar Departamento</h2>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Clave Dependencia: </strong> {{ $departamento->ClaveDep }}</p>
                <p><strong>Dependecia Depende: </strong> {{ $departamento->DepDepende }}</p>
                <p><strong>Nombre del departamento: </strong> {{ $departamento->Nombre }}</p>
            </div>
            <div class="col">
                <p><strong>Nivel: </strong> {{ $departamento->Nivel }}</p>
                <p><strong>Tipo: </strong> {{ $departamento->Tipo }}</p>
            </div>
        </div>
    </section>
@endsection
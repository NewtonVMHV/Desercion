@extends('layouts.sliderbar');
@section('content')
    <section class="container">
        <h2>Agregar Departamento <div class="float-end"> {{ Auth::user()->name }}</div></h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('departamento.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="claveDep" class="form-label is-required">Clave de Departamento</label>
                    <input type="number" class="form-control" id="claveDep" name="ClaveDep" required>
                </div>
                <div class="col">
                    <label for="DepDepende" class="form-label is-required">Departamento Depende</label>
                    <input type="text" class="form-control" id="DepDepende" name="DepDepende" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Nombre" class="form-label is-required">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                </div>
                <div class="col">
                    <label for="Nivel" class="form-label is-required">Nivel</label>
                    <input type="text" class="form-control" id="Nivel" name="Nivel" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Tipo" class="form-label is-required">Tipo</label>
                    <input type="text" class="form-control" id="Tipo" name="Tipo" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Agregar Departamento</button>
                <a href="{{ route('departamento') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>
        </form>
    </section>
@endsection
@extends('layouts.sliderbar')
@section('content')
<section class="container">
    <h2>Editar Fecha de la semana <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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
    <form action="{{ route('semana.update',$semanas) }}" method="post">
        @csrf
        @method('put')
        <div class="row mb-3">
            <div class="col">
                <label for="semana" class="form-label is-required">Semana</label>
                <input type="text" class="form-control" id="semana" name="Semanas" value="{{ $semanas->Semanas }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="inicio" class="form-label is-required">Fecha de Inicio</label>
                <input type="text" class="form-control" id="inicio" name="Fecha_Inicio" placeholder="10 de Julio" value="{{ $semanas->Fecha_Inicio }}" required>
            </div>
            <div class="col">
                <label for="termino" class="form-label is-required">Fecha de Termino</label>
                <input type="text" class="form-control" id="termino" name="Fecha_Termino" placeholder="20 de Julio" value="{{ $semanas->Fecha_Termino }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="inicio" class="form-label is-required">Fecha de Inicio</label>
                <input type="date" class="form-control" id="inicio" name="Inicio" value="{{ $semanas->Inicio }}" required>
            </div>
            <div class="col">
                <label for="termino" class="form-label is-required">Fecha de Termino</label>
                <input type="date" class="form-control" id="termino" name="Termino" value="{{ $semanas->Termino }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="periodo" class="form-label is-required">Selecciona el periodo</label>
                <select class="form-select" aria-label="Default select example" name="Periodo" required>
                    <option selected>{{ $semanas->Periodo }}</option>
                    @foreach ($semanasCiclo as $item)
                        <option value="{{ $item->Nombre }}">{{ $item->Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Editar Semana</button>
            <a href="{{ route('semana') }}" class="btn btn-dark" >Volver al inicio</a>
        </div>
    </form>
</section>
@endsection
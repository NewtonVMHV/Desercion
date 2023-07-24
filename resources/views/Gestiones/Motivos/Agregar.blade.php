@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <h2>Agregar Motivo <div class="float-end"> {{ Auth::user()->name }}</div></h2>
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

        <form action="{{ route('motivo.store') }}" method="post">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="motivo" class="form-label is-required">Nombre del Motivo</label>
                    <input type="text" class="form-control" id="motivo" name="Motivo" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="estatus" class="form-label is-required">Estatus</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" id="estatus" name="Estatus" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Activo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="estatus" name="Estatus">
                        <label class="form-check-label" for="flexCheckChecked">
                            Inactivo
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Agregar Motivo</button>
                <a href="{{ route('motivo') }}" class="btn btn-dark" >Volver al inicio</a>
            </div>

        </form>
    </section>
@endsection
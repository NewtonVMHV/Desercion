@extends('layouts.sliderbar')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header">
              <h3>Eliminar Registro</h3>
            </div>
            <form action="{{ route('asistencia.destroy',$asistencia) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="card-body">
                    <h5 class="card-title text-center">Asistencia de {{ $asistencia->NombreCompleto }}</h5>
                    <p class="card-text text-center">¿Deseas eliminar este registro?</p>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger">Eliminar Asistencia</button>
                        <a href="{{ route('asistencia') }}" class="btn btn-dark" >Volver al inicio</a>
                    </div>
                </div>
            </form>
          </div>
    </section>
@endsection
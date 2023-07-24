@extends('layouts.sliderbar')
@section('content')
<form action="{{ route('perfil.details',Auth::user()->id) }}" class="container">
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  <div class="card">
    <h5 class="card-header">
      @if (Auth::user()->hasRole('Admin'))
        <span class="badge bg-dark">Administrador</span>
      @endif
      @if (Auth::user()->hasRole('Docente'))
        <span class="badge bg-dark">Docente</span>
      @endif
      @if (Auth::user()->hasRole('Tutor'))
        <span class="badge bg-dark">Tutor</span>
      @endif
      @if (Auth::user()->hasRole('Jefe de division'))
        <span class="badge bg-dark">Jefe de División</span>
      @endif
      @if (Auth::user()->hasRole('Subdirector'))
        <span class="badge bg-dark">Subdirector Académico</span>
      @endif
      @if (Auth::user()->hasRole('Director'))
        <span class="badge bg-dark">Director General</span>
      @endif
      {{ Auth::user()->name }}
    </h5>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <p class="card-text"><strong>Nombre: </strong> {{ Auth::user()->name }}</p>
          <p class="card-text"><strong>Correo Electronico: </strong> {{ Auth::user()->email }}</p>
          <p class="card-text"><strong>Educación: </strong> {{ Auth::user()->educacion }}</p>
          <p class="card-text"><strong>Años de Experiencia: </strong> {{ Auth::user()->anio_experiencia }}</p>
        </div>
        <div class="col">
          <p class="card-text"><strong>Fecha de Nacimiento: </strong> {{ Auth::user()->fecha_nacimiento }}</p>
          <p class="card-text"><strong>Telefono: </strong> {{ Auth::user()->telefono }}</p>
          <p class="card-text"><strong>Nivel educativo: </strong> {{ Auth::user()->nivel_educativo }}</p>
          <p class="card-text"><strong>Género: </strong> 
            @if (Auth::user()->genero == '0')
                Masculino
            @endif
            @if (Auth::user()->genero == '1')
                    Femenino
            @endif
            @if (Auth::user()->genero == '2')
                Otro
            @endif
          </p>
        </div>
        <p></p>
        <p class="card-text text-center">{{ Auth::user()->biografia }}</p>
        <p></p>
      </div>
      <div class="d-grid gap-2">
        <a href="{{ route('perfil.edit',Auth::user()->id) }}" class="btn btn-dark" >Actualizar Perfil</a>
      </div>
    </div>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
@endsection
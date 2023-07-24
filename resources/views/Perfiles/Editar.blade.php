@extends('layouts.sliderbar')
@section('content')
<section class="container">
    <h2>Actualizar Perfil</h2>
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
    <form action="{{ route('perfil.update',Auth::user()->id) }}" method="post" class="container justify-content-center">
        @csrf
        @method('put')
        <div class=" row mb-3">
            <div class="col">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ Auth::user()->usuario }}">
            </div>
            <div class="col">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}">
            </div>
            <div class="col">
                <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="nacimiento" name="fecha_nacimiento" value="{{ Auth::user()->fecha_nacimiento }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="genero" class="form-label">Género:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="0" {{ Auth::user()->genero == '0'?'checked':'' }}>
                    <label class="form-check-label" for="genero">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="1" {{ Auth::user()->genero == '1'?'checked':'' }}>
                    <label class="form-check-label" for="genero">Femenino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="2" {{ Auth::user()->genero == '2'?'checked':'' }}>
                    <label class="form-check-label" for="genero">Otro</label>
                </div>
            </div>
            <div class="col">
                <label for="experiencia" class="form-label">Con Experiencia:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="experiencia" id="experiencia" value="0" {{ Auth::user()->experiencia == '0'?'checked':'' }}>
                    <label class="form-check-label" for="experiencia">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="experiencia" id="experiencia" value="1" {{ Auth::user()->experiencia == '1'?'checked':'' }}>
                    <label class="form-check-label" for="experiencia">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="anio" class="form-check-label">Años de experiencia</label>
                    <input type="number" class="form-control" id="anio" name="anio" value="{{ Auth::user()->anio_experiencia }}">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="nivel_educativo" class="form-label">Nivel Educativo</label>
                <input class="form-control" list="datalistOptions" id="nivel_educativo" placeholder="Educación" name="nivel_educativo" value="{{ Auth::user()->nivel_educativo }}">
                <datalist id="datalistOptions">
                    <option value="Primaria">
                    <option value="Secundaria">
                    <option value="Preparatoria">
                    <option value="Universidad">
                    <option value="Maestría">
                    <option value="Doctorado">
                </datalist>
            </div>
            <div class="col">
                <label for="educacion" class="form-label">Educación</label>
                <input type="text" class="form-control" id="educacion" name="educacion" value="{{ Auth::user()->educacion }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="biografia" class="form-label">Biografia</label>
                <textarea class="form-control" id="biografia" rows="3" name="biografia">{{ Auth::user()->biografia }}</textarea>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Actualizar perfil</button>
            <a href="{{ route('perfil.details',$user) }}" class="btn btn-dark" >Volver a mi perfil</a>
        </div>
    </form>
</section>
@endsection
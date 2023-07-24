@extends('layouts.sliderbar')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <section class="container row center">
        @if (Auth::user()->hasRole('Admin'))
            <figure class="text-center">
                <blockquote class="blockquote">
                    <h1>Bienvenido(a)  {{ Auth::user()->name }}</h1>
                </blockquote>
            </figure>
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 15rem;">
                    <div class="card-header">ALUMNOS</div>
                    <div class="card-body">
                        <h5 class="card-title">Información de alumnos</h5>
                        <p class="card-text">{{ $alumnoActivos }} Alumnos Activos</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 15rem;">
                    <div class="card-header">DOCENTES</div>
                    <div class="card-body">
                        <h5 class="card-title">Información de docentes</h5>
                        <p class="card-text">{{ $docente }} Docentes Activos</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 15rem;">
                    <div class="card-header">MATERIAS</div>
                    <div class="card-body">
                        <h5 class="card-title">Información de las materias</h5>
                        <p class="card-text">{{ $materia }} Materias</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                    <div class="card-header">DEPARTAMENTO</div>
                    <div class="card-body">
                        <h5 class="card-title">Información de departamento</h5>
                        <p class="card-text">{{ $departamento }} Departamentos</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-warning mb-3" style="max-width: 15rem;">
                    <div class="card-header">CARRERAS</div>
                    <div class="card-body">
                        <h5 class="card-title">Información de departamento</h5>
                        <p class="card-text">{{ $carrera }} Carreras</p>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-4">
                    <canvas id="GraficaMotivos"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="GraficaReprobadas"></canvas>
                </div>
                <div class="col-4">
                    <canvas id="GraficaAprobadas"></canvas>
                </div>
            </div>
        @else
            <figure class="text-center">
                <blockquote class="blockquote">
                    <h1>Bienvenido(a)  {{ Auth::user()->name }}</h1>
                </blockquote>
            </figure>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Sistema Integral de Alerta Temprana 'Deserción'</h3>
                    <p class="card-text justify-content">La deserción escolar es uno de los problemas educativos 
                    más preocupantes, puesto que es sin lugar a dudas una de las causas más importantes
                    de la falta de desarrollo de muchas sociedades.</p>
                    <p class="card-text justify-content">
                    El Sistema Integral de Alerta Temprana 'Deserción' se desarrolló para prevenir y 
                    acompañar al estudiante durante su educación.
                    </p>
                </div>
            </div>    
        @endif
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels=  {{ Js::from($labels) }};
    var data =  {{ Js::from($data) }};
    const ctx = document.getElementById('GraficaMotivos');

    var labelsReprobada =  {{ Js::from($labelsReprobada) }};
    var dataReprobada =  {{ Js::from($dataReprobada) }};
    const GraficaReprobadas = document.getElementById('GraficaReprobadas');

    var labelsAprobada =  {{ Js::from($labelsAprobada) }};
    var dataAprobada =  {{ Js::from($dataAprobada) }};
    const GraficaAprobada = document.getElementById('GraficaAprobadas');

    new Chart(ctx, {
        type: 'pie',
        data: {
        labels: labels,
        datasets: [{
            label: 'Motivos',
            data: data,
            borderWidth: 1
        }]
        },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Motivos Faltantes'
                }
            }
        }
    });

    new Chart(GraficaReprobadas, {
        type: 'pie',
        data: {
        labels: labelsReprobada,
        datasets: [{
            label: 'Calificación - Reprobatoria',
            data: dataReprobada,
            borderWidth: 1
        }]
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Calificación - Reprobatoria'
            }
            }
        }
    });

    new Chart(GraficaAprobada, {
        type: 'pie',
        data: {
        labels: labelsAprobada,
        datasets: [{
            label: 'Calificación Aprobatorias',
            data: dataAprobada,
            borderWidth: 1
        }]
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Calificación - Aprobatorias'
            }
            }
        }
    });
</script>  
@endsection
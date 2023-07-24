<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

//Usuarios
Route::get('/Usuarios',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/Usuarios/Agregar', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/Usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/Usuarios/{id}/Editar', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/Usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::get('/Usuarios/{id}/Eliminar', [App\Http\Controllers\UserController::class, 'eliminar'])->name('users.eliminar');
Route::delete('/Usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

//Roles
Route::get('/Roles',[App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/Roles/Agregar', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::post('/Roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/Roles/{id}/Editar', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::put('/Roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::get('/Roles/{id}/Eliminar', [App\Http\Controllers\RoleController::class, 'eliminar'])->name('roles.eliminar');
Route::delete('/Roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

//Perfil
Route::get('/Perfil/{user}/Editar', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit');
Route::put('/Perfil/{user}', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class,'show'])->name('perfil.details');

//Alumnos
Route::get('/alumno',[App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno');
Route::get('/alumno/Agregar', [App\Http\Controllers\AlumnoController::class, 'create'])->name('alumno.create');
Route::post('/alumno', [App\Http\Controllers\AlumnoController::class, 'store'])->name('alumo.store');
Route::get('/alumno/{alumno}/Detalles', [App\Http\Controllers\AlumnoController::class, 'show'])->name('alumno.show');
Route::get('/alumno/{alumno}/Editar', [App\Http\Controllers\AlumnoController::class, 'edit'])->name('alumno.edit');
Route::put('/alumno/{alumno}', [App\Http\Controllers\AlumnoController::class, 'update'])->name('alumno.update');
Route::get('/alumno/{alumno}/Eliminar', [App\Http\Controllers\AlumnoController::class, 'eliminar'])->name('alumno.eliminar');
Route::delete('/alumno/{alumno}', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('alumno.destroy');

//Docentes
Route::get('/Docentes',[App\Http\Controllers\PersonalController::class, 'index'])->name('docente');
Route::get('/Docentes/Agregar', [App\Http\Controllers\PersonalController::class, 'create'])->name('docente.create');
Route::post('/Docentes', [App\Http\Controllers\PersonalController::class, 'store'])->name('docente.store');
Route::get('/Docentes/{personal}/Detalles', [App\Http\Controllers\PersonalController::class, 'show'])->name('docente.show');
Route::get('/Docentes/{personal}/Editar', [App\Http\Controllers\PersonalController::class, 'edit'])->name('docente.edit');
Route::put('/Docentes/{personal}', [App\Http\Controllers\PersonalController::class, 'update'])->name('docente.update');
Route::get('/Docentes/{personal}/Eliminar', [App\Http\Controllers\PersonalController::class, 'eliminar'])->name('docente.eliminar');
Route::delete('/Docentes/{personal}', [App\Http\Controllers\PersonalController::class, 'destroy'])->name('docente.destroy');

//Materias
Route::get('/Materia',[App\Http\Controllers\MateriaController::class, 'index'])->name('materia');
Route::get('/Materia/Agregar', [App\Http\Controllers\MateriaController::class, 'create'])->name('materia.create');
Route::post('/Materia', [App\Http\Controllers\MateriaController::class, 'store'])->name('materia.store');
Route::get('/Materia/{materia}/Detalles', [App\Http\Controllers\MateriaController::class, 'show'])->name('materia.show');
Route::get('/Materia/{materia}/Editar', [App\Http\Controllers\MateriaController::class, 'edit'])->name('materia.edit');
Route::put('/Materia/{materia}', [App\Http\Controllers\MateriaController::class, 'update'])->name('materia.update');
Route::get('/Materia/{materia}/Eliminar', [App\Http\Controllers\MateriaController::class, 'eliminar'])->name('materia.eliminar');
Route::delete('/Materia/{materia}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('materia.destroy');

//Carreras
Route::get('/Carrera',[App\Http\Controllers\CarreraController::class, 'index'])->name('carrera');
Route::get('/Carrera/Agregar', [App\Http\Controllers\CarreraController::class, 'create'])->name('carrera.create');
Route::post('/Carrera', [App\Http\Controllers\CarreraController::class, 'store'])->name('carrera.store');
Route::get('/Carrera/{carrera}/Detalles', [App\Http\Controllers\CarreraController::class, 'show'])->name('carrera.show');
Route::get('/Carrera/{carrera}/Editar', [App\Http\Controllers\CarreraController::class, 'edit'])->name('carrera.edit');
Route::put('/Carrera/{carrera}', [App\Http\Controllers\CarreraController::class, 'update'])->name('carrera.update');
Route::get('/Carrera/{carrera}/Eliminar', [App\Http\Controllers\CarreraController::class, 'eliminar'])->name('carrera.eliminar');
Route::delete('/Carrera/{carrera}', [App\Http\Controllers\CarreraController::class, 'destroy'])->name('carrera.destroy');

//Deparatamentos
Route::get('/Departamento',[App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento');
Route::get('/Departamento/Agregar', [App\Http\Controllers\DepartamentoController::class, 'create'])->name('departamento.create');
Route::post('/Departaemnto', [App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento.store');
Route::get('/Deparatamento/{departamento}/Detalles', [App\Http\Controllers\DepartamentoController::class, 'show'])->name('departamento.show');
Route::get('/Deparatamento/{departamento}/Editar', [App\Http\Controllers\DepartamentoController::class, 'edit'])->name('departamento.edit');
Route::put('/Departamento/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento.update');
Route::get('/Deparatamento/{departamento}/Eliminar', [App\Http\Controllers\DepartamentoController::class, 'eliminar'])->name('departamento.eliminar');
Route::delete('/Departamento/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'destroy'])->name('departamento.destroy');

//Periodo
Route::get('/Periodo',[App\Http\Controllers\CicloEscolarController::class, 'index'])->name('periodo');
Route::get('/Periodo/Agregar', [App\Http\Controllers\CicloEscolarController::class, 'create'])->name('periodo.create');
Route::post('/Periodo', [App\Http\Controllers\CicloEscolarController::class, 'store'])->name('periodo.store');
Route::get('/Periodo/{cicloEscolar}/Detalles', [App\Http\Controllers\CicloEscolarController::class, 'show'])->name('periodo.show');
Route::get('/Periodo/{cicloEscolar}/Editar', [App\Http\Controllers\CicloEscolarController::class, 'edit'])->name('periodo.edit');
Route::put('/Periodo/{cicloEscolar}', [App\Http\Controllers\CicloEscolarController::class, 'update'])->name('periodo.update');
Route::get('/Periodo/{cicloEscolar}/Eliminar', [App\Http\Controllers\CicloEscolarController::class, 'eliminar'])->name('periodo.eliminar');
Route::delete('/Periodo/{cicloEscolar}', [App\Http\Controllers\CicloEscolarController::class, 'destroy'])->name('periodo.destroy');

//Semanas
Route::get('/Fecha-del-Periodo',[App\Http\Controllers\SemanasController::class, 'index'])->name('semana');
Route::get('/Fecha-del-Periodo/Agregar', [App\Http\Controllers\SemanasController::class, 'create'])->name('semana.create');
Route::post('/Fecha-del-Periodo', [App\Http\Controllers\SemanasController::class, 'store'])->name('semana.store');
Route::get('/Fecha-del-Periodo/{semanas}/Detalles', [App\Http\Controllers\SemanasController::class, 'show'])->name('semana.show');
Route::get('/Fecha-del-Periodo/{semanas}/Editar', [App\Http\Controllers\SemanasController::class, 'edit'])->name('semana.edit');
Route::put('/Fecha-del-Periodo/{semanas}', [App\Http\Controllers\SemanasController::class, 'update'])->name('semana.update');
Route::get('/Fecha-del-Periodo/{semanas}/Eliminar', [App\Http\Controllers\SemanasController::class, 'eliminar'])->name('semana.eliminar');
Route::delete('/Fecha-del-Periodo/{semanas}', [App\Http\Controllers\SemanasController::class, 'destroy'])->name('semana.destroy');

//Grafica
Route::get('/Control-Estadistico',[App\Http\Controllers\GraficaController::class, 'index'])->name('grafica');
Route::get('/Control-Estadistico/Calificaciones',[App\Http\Controllers\GraficaController::class, 'calificaciones'])->name('grafica.calificaciones');
Route::get('/Control-Estadistico/Desercion',[App\Http\Controllers\GraficaController::class, 'desercion'])->name('grafica.desercion');
Route::get('/Control-Estadistico/Motivos',[App\Http\Controllers\GraficaController::class, 'motivos'])->name('grafica.motivos');

//Reportes
Route::get('/Reportes',[App\Http\Controllers\ReporteController::class, 'index'])->name('reporte');
Route::get('/Reportes/Agregar', [App\Http\Controllers\ReporteController::class, 'create'])->name('reporte.create');
Route::post('/Reportes',[App\Http\Controllers\ReporteController::class, 'store'])->name('reporte.store');
Route::get('/Reportes/Autocomplete',[App\Http\Controllers\ReporteController::class, 'autocomplete'])->name('reporte.autocomplete');
Route::get('/Reportes/{reporte}/Exportar', [App\Http\Controllers\ReporteController::class,'export'])->name('reporte.export');
Route::get('/Reportes/{reporte}/Detalles', [App\Http\Controllers\ReporteController::class, 'show'])->name('reporte.show');
Route::get('/Reportes/{reporte}/Editar', [App\Http\Controllers\ReporteController::class, 'edit'])->name('reporte.edit');
Route::put('/Reportes/{reporte}', [App\Http\Controllers\ReporteController::class, 'update'])->name('reporte.update');
Route::get('/Reportes/{reporte}/Eliminar', [App\Http\Controllers\ReporteController::class, 'eliminar'])->name('reporte.eliminar');
Route::delete('/Reportes/{reporte}', [App\Http\Controllers\ReporteController::class, 'destroy'])->name('reporte.destroy');

//Asistencias
Route::get('/Asistencias',[App\Http\Controllers\AsistenciaController::class, 'index'])->name('asistencia');
Route::get('/Asistencias/Autocomplete',[App\Http\Controllers\AsistenciaController::class, 'autocomplete'])->name('asistencia.autocomplete');
Route::get('/Asistencia/{alumno}/Agregar', [App\Http\Controllers\AsistenciaController::class, 'create'])->name('asistencia.create');
Route::post('/Asistencia', [App\Http\Controllers\AsistenciaController::class, 'store'])->name('asistencia.store');
Route::get('/Asistencia/Editar', [App\Http\Controllers\AsistenciaController::class, 'edit'])->name('asistencia.edit');
Route::get('/Asistencia/{asistencia}/Editar', [App\Http\Controllers\AsistenciaController::class, 'editar'])->name('asistencia.editar');
Route::put('/Asistencia/{asistencia}', [App\Http\Controllers\AsistenciaController::class, 'update'])->name('asistencia.update');
Route::get('/Asistencia/{asistencia}/Eliminar', [App\Http\Controllers\AsistenciaController::class, 'eliminar'])->name('asistencia.eliminar');
Route::delete('/Asistencia/{asistencia}', [App\Http\Controllers\AsistenciaController::class, 'destroy'])->name('asistencia.destroy');


//Motivos Faltantes
Route::get('/Motivos',[App\Http\Controllers\MotivosFaltasController::class, 'index'])->name('motivo');
Route::get('/Motivos/Agregar', [App\Http\Controllers\MotivosFaltasController::class, 'create'])->name('motivo.create');
Route::post('/Motivos', [App\Http\Controllers\MotivosFaltasController::class, 'store'])->name('motivo.store');
Route::get('/Motivos/{motivosFaltas}/Detalles', [App\Http\Controllers\MotivosFaltasController::class, 'show'])->name('motivo.show');
Route::get('/Motivos/{motivosFaltas}/Editar', [App\Http\Controllers\MotivosFaltasController::class, 'edit'])->name('motivo.edit');
Route::put('/Motivos/{motivosFaltas}', [App\Http\Controllers\MotivosFaltasController::class, 'update'])->name('motivo.update');
Route::get('/Motivos/{motivosFaltas}/Eliminar', [App\Http\Controllers\MotivosFaltasController::class, 'eliminar'])->name('motivo.eliminar');
Route::delete('/Motivos/{motivosFaltas}', [App\Http\Controllers\MotivosFaltasController::class, 'destroy'])->name('motivo.destroy');

//Calificaciones
Route::get('/Calificaciones',[App\Http\Controllers\CalificacionesController::class, 'index'])->name('calificaciones');
Route::get('/Calificaciones/Autocomplete',[App\Http\Controllers\CalificacionesController::class, 'autocomplete'])->name('calificaciones.autocomplete');
Route::get('/Calificaciones/{alumno}/Agregar', [App\Http\Controllers\CalificacionesController::class, 'create'])->name('calificaciones.create');
Route::post('/Calificaciones', [App\Http\Controllers\CalificacionesController::class, 'store'])->name('calificaciones.store');
Route::get('/Calificaciones/Editar', [App\Http\Controllers\CalificacionesController::class, 'edit'])->name('calificaciones.edit');
Route::get('/Calificaciones/{calificaciones}/Editar', [App\Http\Controllers\CalificacionesController::class, 'editar'])->name('calificaciones.editar');
Route::put('/Calificaciones/{calificaciones}', [App\Http\Controllers\CalificacionesController::class, 'update'])->name('calificaciones.update');
Route::get('/Calificaciones/{calificaciones}/Eliminar', [App\Http\Controllers\CalificacionesController::class, 'eliminar'])->name('calificaciones.eliminar');
Route::delete('/Calificaciones/{calificaciones}', [App\Http\Controllers\CalificacionesController::class, 'destroy'])->name('calificaciones.destroy');


//Modulo de alertas
Route::get('/Alerta-Temprana',[App\Http\Controllers\AlertaController::class, 'Inasistencia'])->name('Alerta-Inasistencia');
Route::get('/Alerta-Temprana/Filtrado',[App\Http\Controllers\AlertaController::class,'Filter'])->name('Alerta-Inasistencia.Filter');
Route::get('/Alerta-Temprana/{asistencia}/Editar', [App\Http\Controllers\AlertaController::class, 'editarSeguimiento'])->name('Alerta-Inasistencia.editSeguimiento');
Route::put('/Alerta-Temprana/{asistencia}', [App\Http\Controllers\AlertaController::class, 'updateSeguimiento'])->name('Alerta-Inasistencia.updateSeguimiento');
Route::get('/Alerta-Temprana/{asistencia}/Eliminar', [App\Http\Controllers\AlertaController::class, 'eliminarSeguimiento'])->name('Alerta-Inasistencia.eliminarSeguimiento');
Route::delete('/Alerta-Temprana/{asistencia}', [App\Http\Controllers\AlertaController::class, 'destroySeguimiento'])->name('Alerta-Inasistencia.destroySeguimiento');
Route::get('/Alerta-Temprana/Calificaciones',[App\Http\Controllers\AlertaController::class, 'calificaciones'])->name('Alerta-Calificaciones');
Route::get('/Alerta-Temprana/Calificaciones/Filtrado',[App\Http\Controllers\AlertaController::class,'FilterCalificaciones'])->name('Alerta-Inasistencia.FilterCalificaciones');
Route::get('/Alerta-Temprana/Calificaciones/{calificaciones}/Editar', [App\Http\Controllers\AlertaController::class, 'editarSeguimientoCalificacion'])->name('Alerta-Inasistencia.editarSeguimientoCalificacion');
Route::put('/Alerta-Temprana/Calificaciones/{calificaciones}', [App\Http\Controllers\AlertaController::class, 'updateSeguimientoCalificacion'])->name('Alerta-Inasistencia.updateSeguimientoCalificacion');
Route::get('/Alerta-Temprana/Calificaciones/{calificaciones}/Eliminar', [App\Http\Controllers\AlertaController::class, 'eliminarSeguimientoCalificacion'])->name('Alerta-Inasistencia.eliminarSeguimientoCalificacion');
Route::delete('/Alerta-Temprana/Calificaciones/{calificaciones}', [App\Http\Controllers\AlertaController::class, 'destroySeguimientoCalificaciones'])->name('Alerta-Inasistencia.destroySeguimientoCalificaciones');

//Boleta
Route::get('Gestiones/Muestra-Calificaciones',[App\Http\Controllers\BoletaController::class, 'index'])->name('boleta');

//Registros - alumnos
Route::get('/Registro-Alumno',[App\Http\Controllers\RegistroAlumnosController::class, 'index'])->name('registro_alumno');
Route::get('/Registro-Alumno/Agregar', [App\Http\Controllers\RegistroAlumnosController::class, 'create'])->name('registro_alumno.create');
Route::post('/Registro-Alumno', [App\Http\Controllers\RegistroAlumnosController::class, 'store'])->name('registro_alumo.store');
Route::get('/Registro-Alumno/{registro_Alumnos}/Detalles', [App\Http\Controllers\RegistroAlumnosController::class, 'show'])->name('registro_alumno.show');
Route::get('/Registro-Alumno/Autocomplete',[App\Http\Controllers\RegistroAlumnosController::class, 'autocomplete'])->name('registro_alumno.autocomplete');
Route::get('/Registro-Alumno/{registro_Alumnos}/Editar', [App\Http\Controllers\RegistroAlumnosController::class, 'edit'])->name('registro_alumno.edit');
Route::put('/Registro-Alumno/{registro_Alumnos}', [App\Http\Controllers\RegistroAlumnosController::class, 'update'])->name('registro_alumno.update');
Route::get('/Registro-Alumno/{registro_Alumnos}/Eliminar', [App\Http\Controllers\RegistroAlumnosController::class, 'eliminar'])->name('registro_alumno.eliminar');
Route::delete('/Registro-Alumno/{registro_Alumnos}', [App\Http\Controllers\RegistroAlumnosController::class, 'destroy'])->name('registro_alumno.destroy');
Route::delete('/Registro-Alumno', [App\Http\Controllers\RegistroAlumnosController::class, 'eliminarTabla'])->name('registro_alumno.eliminarTabla');
Route::get('/Registro-Alumno/Exportar', [App\Http\Controllers\RegistroAlumnosController::class,'export'])->name('registro_alumno.export');

Route::get('/Registro-Docente',[App\Http\Controllers\RegistroDocentesController::class, 'index'])->name('registro_docente');
Route::get('/Registro-Docente/Agregar', [App\Http\Controllers\RegistroDocentesController::class, 'create'])->name('registro_docente.create');
Route::post('/Registro-Docente', [App\Http\Controllers\RegistroDocentesController::class, 'store'])->name('registro_docente.store');
Route::get('/Registro-Docente/Autocomplete',[App\Http\Controllers\RegistroDocentesController::class, 'autocomplete'])->name('registro_docente.autocomplete');
Route::get('/Registro-Docente/{registro_Docentes}/Detalles', [App\Http\Controllers\RegistroDocentesController::class, 'show'])->name('registro_docente.show');
Route::get('/Registro-Docente/{registro_Docentes}/Editar', [App\Http\Controllers\RegistroDocentesController::class, 'edit'])->name('registro_docente.edit');
Route::put('/Registro-Docente/{registro_Docentes}', [App\Http\Controllers\RegistroDocentesController::class, 'update'])->name('registro_docente.update');
Route::get('/Registro-Docente/{registro_Docentes}/Eliminar', [App\Http\Controllers\RegistroDocentesController::class, 'eliminar'])->name('registro_docente.eliminar');
Route::delete('/Registro-Docente/{registro_Docentes}', [App\Http\Controllers\RegistroDocentesController::class, 'destroy'])->name('registro_docente.destroy');
Route::delete('/Registro-Docente', [App\Http\Controllers\RegistroDocentesController::class, 'eliminarTabla'])->name('registro_docente.eliminarTabla');
Route::get('/Registro-Docente/Exportar', [App\Http\Controllers\RegistroDocentesController::class,'export'])->name('registro_docente.export');

Route::get('/Registro-Externo',[App\Http\Controllers\RegistroExternosController::class, 'index'])->name('externo');
Route::get('/Registro-Externo/Agregar', [App\Http\Controllers\RegistroExternosController::class, 'create'])->name('externo.create');
Route::post('/Registro-Externo', [App\Http\Controllers\RegistroExternosController::class, 'store'])->name('externo.store');
Route::get('/Registro-Externo/{registro_Externos}/Detalles', [App\Http\Controllers\RegistroExternosController::class, 'show'])->name('externo.show');
Route::get('/Registro-Externo/{registro_Externos}/Editar', [App\Http\Controllers\RegistroExternosController::class, 'edit'])->name('externo.edit');
Route::put('/Registro-Externo/{registro_Externos}', [App\Http\Controllers\RegistroExternosController::class, 'update'])->name('externo.update');
Route::get('/Registro-Externo/{registro_Externos}/Eliminar', [App\Http\Controllers\RegistroExternosController::class, 'eliminar'])->name('externo.eliminar');
Route::delete('/Registro-Externo/{registro_Externos}', [App\Http\Controllers\RegistroExternosController::class, 'destroy'])->name('externo.destroy');
Route::delete('/Registro-Externo', [App\Http\Controllers\RegistroExternosController::class, 'eliminarTabla'])->name('externo.eliminarTabla');
Route::get('/Registro-Externo/Exportar', [App\Http\Controllers\RegistroExternosController::class,'export'])->name('externo.export');

//Laboratorios
Route::get('/Laboratorios',[App\Http\Controllers\LaboratoriosController::class, 'index'])->name('laboratorio');
Route::get('/Laboratorios/Agregar', [App\Http\Controllers\LaboratoriosController::class, 'create'])->name('laboratorio.create');
Route::post('/Laboratorios', [App\Http\Controllers\LaboratoriosController::class, 'store'])->name('laboratorio.store');
Route::get('/Laboratorios/{laboratorios}/Detalles', [App\Http\Controllers\LaboratoriosController::class, 'show'])->name('laboratorio.show');
Route::get('/Laboratorios/{laboratorios}/Editar', [App\Http\Controllers\LaboratoriosController::class, 'edit'])->name('laboratorio.edit');
Route::put('/Laboratorios/{laboratorios}', [App\Http\Controllers\LaboratoriosController::class, 'update'])->name('laboratorio.update');
Route::get('/Laboratorios/{laboratorios}/Eliminar', [App\Http\Controllers\LaboratoriosController::class, 'eliminar'])->name('laboratorio.eliminar');
Route::delete('/Laboratorios/{Laboratorios}', [App\Http\Controllers\LaboratoriosController::class, 'destroy'])->name('laboratorio.destroy');
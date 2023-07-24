<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'CicloEscolar',
        'Carrera',
        'Semestre',
        'Semana',
        'Matricula',
        'NombreCompleto',
        'Materia',
        'Docente',
        'Inasistencia',
        'Motivo',
        'Estatus'
    ];
}

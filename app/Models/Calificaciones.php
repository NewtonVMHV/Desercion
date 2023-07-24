<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'CicloEscolar',
        'Unidades',
        'Carrera',
        'Semestre',
        'Matricula',
        'Nombre',
        'Materia',
        'Docente',
        'Calificacion',
        'Estatus'
    ];
}

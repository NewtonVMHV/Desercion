<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Alumnos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Matricula','Nombre','Fecha','Hora','Actividad','Carrera','Materia','Laboratorio','Observaciones'
    ];
}

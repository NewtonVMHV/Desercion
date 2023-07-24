<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Docentes extends Model
{
    use HasFactory;

    protected $fillable = [
        'RFC','Nombre','Fecha', 'Hora','Numero','Actividad','Carrera','Materia','Laboratorio','Observaciones'
    ];
}

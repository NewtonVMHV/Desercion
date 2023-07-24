<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'Curp',
        'Nombre',
        'A_Paterno',
        'A_Materno',
        'F_Nacimiento',
        'Telefono',
        'Correo',
        'estatus',
        'carrera',
        'Semestre'
    ];
}

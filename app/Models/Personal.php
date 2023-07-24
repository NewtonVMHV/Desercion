<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'RFC','Curp','Nombre','Apellidos','F_Nacimiento','Telefono','Correo','Escolaridad','Estudios','estatus','carrera','departamento'
    ];
}

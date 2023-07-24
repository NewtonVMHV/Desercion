<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'Interna','Clave_Oficial','Reticula','Nivel_Escolar','Modalidad','Nombre','Reducido','Siglas','Creditos','Maxima','Minima'
    ];
}

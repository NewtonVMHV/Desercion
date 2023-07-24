<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'ClaveMat','NivelEscolar','Nombre','TipoMateria','NombreAbreviado','Creditos','carrera','Semestre','Unidades'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_Externos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre','Fecha','Hora','Numero','Carrera','Observaciones','Laboratorio','Actividad'
    ];
}

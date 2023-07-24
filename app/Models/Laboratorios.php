<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
    use HasFactory;

    protected $fillable = [
        'Clave','Nombre','Siglas','Departamento'
    ];
}

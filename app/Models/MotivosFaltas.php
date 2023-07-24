<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivosFaltas extends Model
{
    use HasFactory;

    protected $fillable = [
        'Motivo','Estatus'
    ];
}

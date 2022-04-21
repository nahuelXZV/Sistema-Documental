<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenFisico extends Model
{
    use HasFactory;
    protected $fillable = [
        'pulsos',
        'FR',
        'FC',
        't_axilar',
        'peso',
        'talla',
        'imc',
        'circunferencia_abdominal',
        'estado_nutricional',
        'otros',
        'paciente_id',
    ];
}

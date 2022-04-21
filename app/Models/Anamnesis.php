<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'datos_referidos',
        'motivo_ingreso',
        'motivo_consulta',
        'antecedentes_actuales',
        'detalles_enfermedad',
        'consulta_id',
    ];
}

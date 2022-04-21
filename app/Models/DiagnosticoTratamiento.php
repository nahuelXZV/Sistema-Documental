<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoTratamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'principal',
        'secundario',
        'justificacion',
        'tratamiento',
        'plan_trabajo',
        'consulta_id',
    ];
}

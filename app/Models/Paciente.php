<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombre',
        'fecha_nacimiento',
        'sexo',
        'pais',
        'departamento',
        'distrito',
        'nacionalidad',
        'estado_civil',
        'nivel_educativo',
        'año_cursado',
        'seguro_medico',
        'situacion_laboral',
    ];
}

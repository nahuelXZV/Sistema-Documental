<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosParentales extends Model
{
    use HasFactory;
    protected $fillable = [
        'vinculo',
        'nombre',
        'apellido',
        'tipo_documento',
        'documento',
        'telefono',
        'edad',
        'ocupacion',
        'estado_civil',
        'nivel_educativo',
        'otros',
        'paciente_id',
    ];
}

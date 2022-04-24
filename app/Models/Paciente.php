<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Paciente extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombre',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'pais',
        'departamento',
        'nacionalidad',
        'estado_civil',
        'nivel_educativo',
        'año_cursado',
        'situacion_laboral',
    ];
}

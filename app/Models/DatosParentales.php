<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class DatosParentales extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;

    protected $fillable = [
        'vinculo',
        'nombre',
        'apellido',
        'tipo_documento',
        'documento',
        'edad',
        'ocupacion',
        'estado_civil',
        'nivel_educativo',
        'otros',
        'paciente_id',
    ];
}

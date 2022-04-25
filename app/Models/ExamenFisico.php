<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class ExamenFisico extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    
    protected $fillable = [
        'pulsos',
        'FR',
        'FC',
        't_axilar',
        'peso',
        'talla',
        'imc',
        'estado_nutricional',
        'otros',
        'paciente_id',
    ];
}

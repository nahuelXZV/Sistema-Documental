<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Residencia extends Model implements Auditable
{
    use AuditingAuditable;
    use HasFactory;
    protected $fillable = [
        'pais',
        'departamento',
        'barrio',
        'direccion',
        'nro_casa',
        'referencia',
        'paciente_id',
    ];
}

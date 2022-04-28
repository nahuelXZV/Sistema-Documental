<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Documentos extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = [
        'dir',
        'nombre',
        'tipo',
        'analisis_id',
    ];
}

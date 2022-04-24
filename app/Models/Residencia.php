<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
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

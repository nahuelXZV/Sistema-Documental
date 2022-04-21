<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'departamento',
        'municipio',
        'barrio',
        'area',
        'direccion',
        'nro_casa',
        'telefono',
        'referencia',
        'paciente_id',
    ];
}

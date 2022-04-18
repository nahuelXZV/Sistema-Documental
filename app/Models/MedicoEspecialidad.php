<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoEspecialidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico_id',
        'especialidad_medica_id',
    ];
}

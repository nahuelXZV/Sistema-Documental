<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadMedica extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'medico_especialidads', 'especialidad_medica_id', 'medico_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'apellido',
        'sexo',
    ];

    public function especialidades()
    {
        return $this->belongsToMany(EspecialidadMedica::class, 'medico_especialidads', 'medico_id', 'especialidad_medica_id');
    }

    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'medico_horarios', 'medico_id', 'horario_id');
    }
}

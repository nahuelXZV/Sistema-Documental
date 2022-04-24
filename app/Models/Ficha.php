<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico_id',
        'especialidad_id',
        'horario_id',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
    public function especialidad()
    {
        return $this->belongsTo(EspecialidadMedica::class);
    }
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}

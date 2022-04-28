<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitos extends Model
{
    use HasFactory;
    protected $fillable = [
        'alimenticio',
        'defecatorio',
        'urinario',
        'actividad_fisica',
        'tiempo',
        'frecuencia',
        'otros',
        'anamnesis_id',
    ];
}

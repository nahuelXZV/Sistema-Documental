<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CausaTraumatismo extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_causa',
        'descripcion',
        'sitio_recurrencia',
        'anamnesis_id',
    ];
}

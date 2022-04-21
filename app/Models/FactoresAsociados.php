<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoresAsociados extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_causa',
        'descripcion',
        'anamnesis_id',
    ];
}

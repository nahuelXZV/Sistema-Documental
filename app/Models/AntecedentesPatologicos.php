<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesPatologicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'anamnesis_id',
    ];
}

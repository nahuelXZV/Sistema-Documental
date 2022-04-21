<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamnesisPatologicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'antecedentes_patologicos_id',
        'anamnesis_id',
    ];
}

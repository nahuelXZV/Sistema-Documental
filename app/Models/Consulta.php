<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'paciente_id',
        'ficha_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    
    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }
}

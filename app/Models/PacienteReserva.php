<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteReserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reserva_id',
    ];
}

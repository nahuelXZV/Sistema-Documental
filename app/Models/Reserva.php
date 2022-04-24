<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_creacion',
        'fecha_reserva',
        'ficha_id',
        'user_id',
    ];

    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

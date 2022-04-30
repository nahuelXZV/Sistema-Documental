<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico',
        'Mnombre',
        'evento',
        'fecha',
        'paciente_id',
    ];

    static public function Bitacora($medico, $Mnombre, $evento, $paciente_id)
    {
        $bitacora = new Bitacora();
        $bitacora->medico = $medico;
        $bitacora->Mnombre = $Mnombre;
        $bitacora->evento = $evento;
        $bitacora->fecha = now();
        $bitacora->paciente_id = $paciente_id;
        $bitacora->save();
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}

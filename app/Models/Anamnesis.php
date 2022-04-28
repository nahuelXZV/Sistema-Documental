<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Anamnesis extends Model implements Auditable
{
    use AuditingAuditable;
    use HasFactory;
    protected $fillable = [
        'motivo_ingreso',
        'motivo_consulta',
        'antecedentes_actuales',
        'consulta_id',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function patologicos()
    {
        return $this->hasMany(AntecedentesPatologicos::class);
    }

    public function habitos()
    {
        return $this->hasMany(Habitos::class);
    }

    public function causa_traumatismo()
    {
        return $this->hasMany(CausaTraumatismo::class);
    }

    public function diagnostico()
    {
        return $this->hasMany(Diagnostico::class);
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class);
    }

    public function documento()
    {
        return $this->hasMany(Documento::class);
    }
}

<?php

namespace App\Http\Livewire\Paciente\Historial;

use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Residencia;
use Livewire\Component;

class LwIndex extends Component
{
    public $paciente;
    public function mount($id)
    {
        $this->paciente = Paciente::find($id);
    }
    public function render()
    {
        $residencia = Residencia::where('paciente_id', $this->paciente->id)->first();
        $fisicos = ExamenFisico::where('paciente_id', $this->paciente->id)->first();
        $parentales = DatosParentales::where('paciente_id', $this->paciente->id)
            ->where('vinculo', 'Padre')->first();
        $maternales = DatosParentales::where('paciente_id', $this->paciente->id)
            ->where('vinculo', 'Madre')->first();
        return view('livewire.paciente.historial.lw-index', compact('residencia', 'fisicos', 'parentales', 'maternales'));
    }
}

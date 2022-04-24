<?php

namespace App\Http\Livewire\Paciente\Bitacora;

use Livewire\Component;
use OwenIt\Auditing\Models\Audit;

class LwIndex extends Component
{
    public function render()
    {
        $auditoria = Audit::all();
        return view('livewire.paciente.bitacora.lw-index', compact('auditoria'));
    }
}

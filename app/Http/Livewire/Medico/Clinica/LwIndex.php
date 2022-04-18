<?php

namespace App\Http\Livewire\Medico\Clinica;

use App\Models\Clinica;
use Livewire\Component;

class LwIndex extends Component
{

    public function render()
    {
        $clinica = Clinica::find(1);
        $nombre = $clinica->nombre;
        return view('livewire.medico.clinica.lw-index', compact('clinica',  'nombre'));
    }
}

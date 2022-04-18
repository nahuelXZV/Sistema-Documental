<?php

namespace App\Http\Livewire\Medico\Especialidades;

use App\Models\EspecialidadMedica;
use Livewire\Component;

class LwCreate extends Component
{
    public $nombre;

    public function add()
    {
        $this->validate([
            'nombre' => 'required|min:3|max:50',
        ]);
        EspecialidadMedica::create(['nombre' => $this->nombre]);
        return redirect()->route('especialidades.index');
    }
    public function limpiar()
    {
        $this->nombre = '';
    }
    public function render()
    {
        return view('livewire.medico.especialidades.lw-create');
    }
}

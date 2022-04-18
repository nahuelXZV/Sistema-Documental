<?php

namespace App\Http\Livewire\Medico\Especialidades;

use App\Models\EspecialidadMedica;
use Livewire\Component;

class LwEdit extends Component
{
    public $nombre;
    public $especialidad;
    public function mount($id)
    {
        $this->especialidad = EspecialidadMedica::find($id);
        $this->nombre = $this->especialidad->nombre;
    }

    public function edit()
    {
        $this->validate([
            'nombre' => 'required|min:3|max:50',
        ]);
        $this->especialidad->nombre = $this->nombre;
        $this->especialidad->update();
        return redirect()->route('especialidades.index');
    }

    public function render()
    {
        return view('livewire.medico.especialidades.lw-edit');
    }
}

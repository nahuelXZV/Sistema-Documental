<?php

namespace App\Http\Livewire\Medico\Horario;

use App\Models\Horario;
use Livewire\Component;

class LwCreate extends Component
{
    public $horario = [];

    public function add()
    {
        $this->validate([
            'horario.dia' => 'required',
            'horario.hora_fin' => 'required',
            'horario.hora_inicio' => 'required',
        ]);
        Horario::create($this->horario);
        return redirect()->route('horarios.index');
    }

    public function limpiar()
    {
        $this->medico = [];
    }

    public function render()
    {
        return view('livewire.medico.horario.lw-create');
    }
}

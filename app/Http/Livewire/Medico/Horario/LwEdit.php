<?php

namespace App\Http\Livewire\Medico\Horario;

use App\Models\Horario;
use Livewire\Component;

class LwEdit extends Component
{
    public $horarioB;
    public $horario = [];
    public function mount($id)
    {
        $this->horarioB = Horario::find($id);
        $this->horario = $this->horarioB->toArray();
    }
    public function edit()
    {
        $this->validate([
            'horario.dia' => 'required',
            'horario.hora_fin' => 'required',
            'horario.hora_inicio' => 'required',
        ]);
        Horario::find($this->horario['id'])->update($this->horario);
        return redirect()->route('horarios.index');
    }
    public function limpiar()
    {
        $this->medico = [];
    }
    public function render()
    {
        return view('livewire.medico.horario.lw-edit');
    }
}

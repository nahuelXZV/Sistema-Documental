<?php

namespace App\Http\Livewire\Medico\Medico;

use App\Models\EspecialidadMedica;
use App\Models\Medico;
use Livewire\Component;

class LwEdit extends Component
{
    public $medico = [];
    public $Medico1;
    public $especialidadL = [];
    public $Lespecialidad;
    public function mount($id)
    {
        $this->Medico1 = Medico::find($id);
        $this->medico = $this->Medico1->toArray();
        $this->Lespecialidad = $this->Medico1->especialidades->pluck('id')->toArray();
        foreach ($this->Lespecialidad as $item) {
            $this->especialidadL[$item] = $item;
        }
    }
    public function edit()
    {
        $this->validate([
            'medico.nombre' => 'required',
            'medico.apellido' => 'required',
            'medico.sexo' => 'required',
            'medico.email' => 'required|email',
            'medico.telefono' => 'required',
        ]);
        Medico::find($this->medico['id'])->update($this->medico);
        $this->Medico1->especialidades()->sync($this->especialidadL);
        return redirect()->route('medicos.index');
    }
    public function limpiar()
    {
        $this->medico = [];
    }
    public function render()
    {
        $especialidades = EspecialidadMedica::all();
        return view('livewire.medico.medico.lw-edit', compact('especialidades'));
    }
}

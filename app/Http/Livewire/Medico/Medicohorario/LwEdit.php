<?php

namespace App\Http\Livewire\Medico\Medicohorario;

use App\Models\EspecialidadMedica;
use App\Models\Ficha;
use App\Models\Horario;
use App\Models\Medico;
use Livewire\Component;

class LwEdit extends Component
{
    public $id_especialidad;
    public $id_medico;
    public $id_horario;
    public $ficha;
    public function mount($id)
    {
        $this->ficha = Ficha::find($id);
        $this->id_especialidad = $this->ficha->especialidad_id;
        $this->id_medico = $this->ficha->medico_id;
        $this->id_horario = $this->ficha->horario_id;
    }
    public function edit()
    {
        $this->validate([
            'id_horario' => 'required',
        ]);
        $this->ficha->horario_id = $this->id_horario;
        $this->ficha->update();
        return redirect()->route('horarios.index');
    }
    public function limpiar()
    {
        $this->id_horario = '';
    }
    public function render()
    {
        $medico = Medico::find($this->id_medico);
        $especialidad = EspecialidadMedica::find($this->id_especialidad);
        $horarios = Horario::all();
        return view('livewire.medico.medicohorario.lw-edit', compact('medico', 'especialidad', 'horarios'));
    }
}

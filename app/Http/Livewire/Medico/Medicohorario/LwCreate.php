<?php

namespace App\Http\Livewire\Medico\Medicohorario;

use App\Models\EspecialidadMedica;
use App\Models\Ficha;
use App\Models\Horario;
use App\Models\Medico;
use Livewire\Component;

class LwCreate extends Component
{
    public $id_especialidad;
    public $id_medico;
    public $id_horario;

    public function add()
    {
        $this->validate([
            'id_especialidad' => 'required',
            'id_medico' => 'required',
            'id_horario' => 'required',
        ]);
        Ficha::create([
            'especialidad_id' => $this->id_especialidad,
            'medico_id' => $this->id_medico,
            'horario_id' => $this->id_horario,
        ]);
        return redirect()->route('medico_horario.index');
    }

    public function limpiar()
    {
        $this->id_especialidad = '';
        $this->id_medico = '';
        $this->id_horario = '';
    }

    public function render()
    {
        $medicos = Medico::all();
        $horarios = Horario::all();
        if ($this->id_medico != '') {
            $medico = Medico::find($this->id_medico);
            $especialidades = $medico->especialidades;
        } else {
            $especialidades = [];
        }
        return view('livewire.medico.medicohorario.lw-create', compact('especialidades', 'medicos', 'horarios'));
    }
}

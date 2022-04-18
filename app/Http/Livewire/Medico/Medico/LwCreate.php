<?php

namespace App\Http\Livewire\Medico\Medico;

use App\Models\EspecialidadMedica;
use App\Models\Medico;
use App\Models\MedicoEspecialidad;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{
    public $medico = [];
    public $especialidadL = [];

    public function add()
    {
        $this->validate([
            'medico.nombre' => 'required',
            'medico.apellido' => 'required',
            'medico.sexo' => 'required',
            'medico.email' => 'required|email',
            'medico.telefono' => 'required',
        ]);
        $medico = Medico::create($this->medico);
        foreach ($this->especialidadL as $especialidad) {
            MedicoEspecialidad::create([
                'medico_id' => $medico->id,
                'especialidad_medica_id' => $especialidad
            ]);
        }
        return redirect()->route('medicos.index');
    }
    public function limpiar()
    {
        $this->medico = [];
    }
    public function render()
    {
        $especialidades = EspecialidadMedica::all();
        return view('livewire.medico.medico.lw-create', compact('especialidades'));
    }
}

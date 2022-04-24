<?php

namespace App\Http\Livewire\Medico\Medico;

use App\Models\EspecialidadMedica;
use App\Models\Horario;
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
            'medico.password' => 'required',
        ]);
        $medico = Medico::create([
            'nombre' => $this->medico['nombre'],
            'apellido' => $this->medico['apellido'],
            'sexo' => $this->medico['sexo'],
            'email' => $this->medico['email'],
            'telefono' => $this->medico['telefono'],
        ]);
        $name = $this->medico['nombre'] . ' ' . $this->medico['apellido'];
        User::create([
            'name' => $name,
            'email' => $this->medico['email'],
            'password' => bcrypt($this->medico['password']),
            'tipo_user' => 'medico',
            'medico_id' => $medico->id,
            'paciente_id' => null,
        ])->assignRole('Médico');;
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

<?php

namespace App\Http\Livewire\Paciente\Reserva;

use App\Models\EspecialidadMedica;
use App\Models\Ficha;
use App\Models\Reserva;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{

    public $id_especialidades;
    public $fecha_reserva;
    public $ficha_id;
    public $user_id;
 

    public function add()
    {
        $this->validate([
            'id_especialidades' => 'required',
            'fecha_reserva' => 'required',
            'ficha_id' => 'required',
            'user_id' => 'required',
        ]);
        Reserva::create([
            'fecha_creacion' => now(),
            'fecha_reserva' => $this->fecha_reserva,
            'ficha_id' => $this->ficha_id,
            'user_id' => $this->user_id,
        ]);
        return redirect()->route('reservas.index');
    }

    public function limpiar()
    {
        $this->id_especialidades = '';
        $this->fecha_reserva = '';
        $this->ficha_id = '';
        $this->user_id = '';
    }

    public function render()
    {
        $pacientes = User::where('tipo_user', '=', 'paciente')->get();
        $especialidades = EspecialidadMedica::all();
        if ($this->id_especialidades != '') {
            $fichas = Ficha::where('especialidad_id', $this->id_especialidades)->get();
        } else {
            $fichas = [];
        }
        return view('livewire.paciente.reserva.lw-create', compact('pacientes', 'especialidades', 'fichas'));
    }
}

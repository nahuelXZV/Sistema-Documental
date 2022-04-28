<?php

namespace App\Http\Livewire\Paciente\Historial;

use App\Models\Consulta;
use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\Residencia;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{

    public $generales = [];
    public $residencia = [];
    public $parentales = [];
    public $maternales = [];
    public $fisicos = [];
    public $user;
    public $reserva; 
    public function mount($id, $reservaid)
    {
        $this->user = User::find($id);
        $this->reserva = Reserva::find($reservaid);
    }

    public function add()
    {
        $this->validate([
            'generales.nombre' => 'required',
            'generales.fecha_nacimiento' => 'required',
            'generales.sexo' => 'required',
            'generales.tipo_documento' => 'required',
            'generales.documento' => 'required',
            'generales.telefono' => 'required',
            'generales.pais' => 'required',
            'generales.nacionalidad' => 'required',
            'generales.departamento' => 'required',
            'generales.estado_civil' => 'required',
            'generales.nivel_educativo' => 'required',
            'generales.año_cursado' => 'required',
            'generales.situacion_laboral' => 'required',
            'residencia.pais' => 'required',
            'residencia.departamento' => 'required',
            'residencia.barrio' => 'required',
            'residencia.direccion' => 'required',
            'residencia.nro_casa' => 'required',
            'residencia.referencia' => 'required',
        ]);
        $paciente = Paciente::create($this->generales);
        $this->user->paciente_id = $paciente->id;
        $this->user->update();
        if ($this->residencia) {
            $this->residencia['paciente_id'] = $paciente->id;
            Residencia::create($this->residencia);
        }
        if ($this->parentales != []) {
            $this->validate([
                'parentales.nombre' => 'required',
                'parentales.apellido' => 'required',
                'parentales.tipo_documento' => 'required',
                'parentales.documento' => 'required',
                'parentales.edad' => 'required',
                'parentales.ocupacion' => 'required',
                'parentales.estado_civil' => 'required',
                'parentales.nivel_educativo' => 'required',
            ]);
            $this->parentales['paciente_id'] = $paciente->id;
            $this->parentales['vinculo'] = 'Padre';
            DatosParentales::create($this->parentales);
        }
        if ($this->maternales != []) {
            $this->validate([
                'maternales.nombre' => 'required',
                'maternales.apellido' => 'required',
                'maternales.tipo_documento' => 'required',
                'maternales.documento' => 'required',
                'maternales.edad' => 'required',
                'maternales.ocupacion' => 'required',
                'maternales.estado_civil' => 'required',
                'maternales.nivel_educativo' => 'required',
            ]);
            $this->maternales['paciente_id'] = $paciente->id;
            $this->maternales['vinculo'] = 'Madre';
            DatosParentales::create($this->maternales);
        }
        if ($this->fisicos != []) {
            $this->validate([
                'fisicos.pulsos' => 'required',
                'fisicos.FR' => 'required',
                'fisicos.FC' => 'required',
                'fisicos.t_axilar' => 'required',
                'fisicos.peso' => 'required',
                'fisicos.talla' => 'required',
                'fisicos.imc' => 'required',
                'fisicos.estado_nutricional' => 'required',
            ]);
            $this->fisicos['paciente_id'] = $paciente->id;
            ExamenFisico::create($this->fisicos);
        }
        $this->consulta($paciente->id);
        return redirect()->route('historial.index', $paciente->id);
    }


    public function consulta($id)
    {
        $consulta = Consulta::create([
            'fecha' => now(),
            'paciente_id' => $id,
            'ficha_id' => $this->reserva->ficha_id,
        ]);
        $this->reserva->consulta_id = $consulta->id;
        $this->reserva->update();
    }

    public function limpiar()
    {
        $this->generales = [];
        $this->residencia = [];
        $this->parental = [];
        $this->maternal = [];
        $this->fisico = [];
    }

    public function render()
    {
        return view('livewire.paciente.historial.lw-create');
    }
}

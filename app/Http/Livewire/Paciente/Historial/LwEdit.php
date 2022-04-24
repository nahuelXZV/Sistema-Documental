<?php

namespace App\Http\Livewire\Paciente\Historial;

use Livewire\Component;

use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Residencia;
use App\Models\User;

class LwEdit extends Component
{
    public $generales = [];
    public $residencia = [];
    public $parentales = [];
    public $maternales = [];
    public $fisicos = [];

    public function mount($id)
    {
        $this->generales = Paciente::find($id)->toArray();
        $this->residencia = Residencia::where('paciente_id', $this->generales['id'])->first()->toArray();
        if (DatosParentales::where('paciente_id', $this->generales['id'])
            ->where('vinculo', 'Padre')->first()
        ) {
            $this->parentales = DatosParentales::where('paciente_id', $this->generales['id'])
                ->where('vinculo', 'Padre')->first()->toArray();
        }

        if (DatosParentales::where('paciente_id', $this->generales['id'])
            ->where('vinculo', 'Madre')->first()
        ) {
            $this->maternales = DatosParentales::where('paciente_id', $this->generales['id'])
                ->where('vinculo', 'Madre')->first()->toArray();
        }
        if (ExamenFisico::where('paciente_id', $this->generales['id'])->first()) {

            $this->fisicos = ExamenFisico::where('paciente_id', $this->generales['id'])->first()->toArray();
        }
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
        $paciente = Paciente::find($this->generales['id']);
        $paciente->nombre = $this->generales['nombre'];
        $paciente->fecha_nacimiento = $this->generales['fecha_nacimiento'];
        $paciente->sexo = $this->generales['sexo'];
        $paciente->tipo_documento = $this->generales['tipo_documento'];
        $paciente->documento = $this->generales['documento'];
        $paciente->telefono = $this->generales['telefono'];
        $paciente->pais = $this->generales['pais'];
        $paciente->nacionalidad = $this->generales['nacionalidad'];
        $paciente->estado_civil = $this->generales['estado_civil'];
        $paciente->nivel_educativo = $this->generales['nivel_educativo'];
        $paciente->año_cursado = $this->generales['año_cursado'];
        $paciente->situacion_laboral = $this->generales['situacion_laboral'];
        $paciente->save();
        if ($this->residencia) {
            $residencia = Residencia::where('paciente_id', $paciente->id)->first();
            $residencia->save($this->residencia);
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
            if (DatosParentales::where('paciente_id', $paciente->id)
                ->where('vinculo', "Padre")->first()
            ) {
                $this->parentales('Padre', $paciente, $this->parentales);
            } else {
                $this->parentales['paciente_id'] = $paciente->id;
                $this->parentales['vinculo'] = 'Padre';
                DatosParentales::create($this->parentales);
            }
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
            if (DatosParentales::where('paciente_id', $paciente->id)
                ->where('vinculo', "Madre")->first()
            ) {
                $this->parentales('Madre', $paciente, $this->maternales);
            } else {
                $this->maternales['paciente_id'] = $paciente->id;
                $this->maternales['vinculo'] = 'Madre';
                DatosParentales::create($this->maternales);
            }
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
            if (ExamenFisico::where('paciente_id', $paciente->id)->first()) {
                $fisicos = ExamenFisico::where('paciente_id', $paciente->id)->first();
                $fisicos->pulsos = $this->fisicos['pulsos'];
                $fisicos->FR = $this->fisicos['FR'];
                $fisicos->FC = $this->fisicos['FC'];
                $fisicos->t_axilar = $this->fisicos['t_axilar'];
                $fisicos->peso = $this->fisicos['peso'];
                $fisicos->talla = $this->fisicos['talla'];
                $fisicos->imc = $this->fisicos['imc'];
                $fisicos->estado_nutricional = $this->fisicos['estado_nutricional'];
                $fisicos->save();
            } else {
                $this->fisicos['paciente_id'] = $paciente->id;
                ExamenFisico::create($this->fisicos);
            }
        }
        return redirect()->route('historial.index', $paciente->id);
    }


    public function parentales($vinculo, $paciente, $array)
    {
        $parentales = DatosParentales::where('paciente_id', $paciente->id)
            ->where('vinculo', $vinculo)->first();
        $parentales->nombre = $array['nombre'];
        $parentales->apellido = $array['apellido'];
        $parentales->tipo_documento = $array['tipo_documento'];
        $parentales->documento = $array['documento'];
        $parentales->edad = $array['edad'];
        $parentales->ocupacion = $array['ocupacion'];
        $parentales->estado_civil = $array['estado_civil'];
        $parentales->nivel_educativo = $array['nivel_educativo'];
        if ($array['otros']) {
            $parentales->otros = $array['otros'];
        }
        $parentales->save();
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
        return view('livewire.paciente.historial.lw-edit');
    }
}

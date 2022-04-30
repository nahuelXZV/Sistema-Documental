<?php

namespace App\Http\Livewire\Paciente\Consulta;

use App\Models\Analisis;
use App\Models\Anamnesis;
use App\Models\AnamnesisPatologicos;
use App\Models\AntecedentesPatologicos;
use App\Models\CausaTraumatismo;
use App\Models\Consulta;
use App\Models\DiagnosticoTratamiento;
use App\Models\Documentos;
use App\Models\Habitos;
use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithFileUploads;

class LwEdit extends Component
{
    use WithFileUploads;
    public $consulta;
    public $anamnesis = [];
    public $anamnesis_patologicos = [];
    public $habitos = [];
    public $causa_traumatismo = [];
    public $diagnostico = [];
    public $analisis = [];
    public $pdfs = [];
    public $imagenes = [];

    public function mount($id)
    {
        $this->consulta = Consulta::find($id);
    }

    public function add()
    {
        $this->validate([
            'anamnesis.motivo_ingreso' => 'required',
            'anamnesis.motivo_consulta' => 'required',
            'anamnesis.antecedentes_actuales' => 'required',
        ]);
        if ($this->habitos) {
            $this->validate([
                'habitos.alimenticio' => 'required',
                'habitos.defecatorio' => 'required',
                'habitos.urinario' => 'required',
                'habitos.actividad_fisica' => 'required',
                'habitos.tiempo' => 'required',
                'habitos.frecuencia' => 'required',
            ]);
        }
        if ($this->causa_traumatismo) {
            $this->validate([
                'causa_traumatismo.tipo_causa' => 'required',
                'causa_traumatismo.descripcion' => 'required',
                'causa_traumatismo.sitio_recurrencia' => 'required',
            ]);
        }
        if ($this->diagnostico) {
            $this->validate([
                'diagnostico.principal' => 'required',
                'diagnostico.tratamiento' => 'required',
                'diagnostico.plan_trabajo' => 'required',
            ]);
        }
        if ($this->analisis) {
            $this->validate([
                'analisis.tipo' => 'required',
                'analisis.descripcion' => 'required',
                'analisis.fecha' => 'required',
            ]);
        }

        $this->anamnesis['consulta_id'] = $this->consulta->id;
        $anamnesis = Anamnesis::create($this->anamnesis);
        if ($this->anamnesis_patologicos) {
            foreach ($this->anamnesis_patologicos as $iteam) {
                $ap['anamnesis_id'] = $anamnesis->id;
                $ap['antecedentes_patologicos_id'] = $iteam;
                AnamnesisPatologicos::create($ap);
            }
        }
        if ($this->habitos) {
            $this->habitos['anamnesis_id'] = $anamnesis->id;
            Habitos::create($this->habitos);
        }
        if ($this->causa_traumatismo) {
            $this->causa_traumatismo['anamnesis_id'] = $anamnesis->id;
            CausaTraumatismo::create($this->causa_traumatismo);
        }
        if ($this->diagnostico) {
            $this->diagnostico['consulta_id'] = $this->consulta->id;
            DiagnosticoTratamiento::create($this->diagnostico);
        }
        if ($this->analisis) {
            $this->analisis['consulta_id'] = $this->consulta->id;
            $analisis = Analisis::create($this->analisis);
            if ($this->imagenes) {
                $this->validate([
                    'imagenes.*' => 'required|image',
                ]);
                foreach ($this->imagenes as $imagen) {
                    $documento = new Documentos();
                    $documento->nombre = $imagen->getClientOriginalName();
                    $documento->tipo = $imagen->extension();
                    $documento->dir = 'https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/' . $imagen->store('documentos', 's3');
                    $documento->analisis_id = $analisis->id;
                    $documento->save();
                }
            }
            if ($this->pdfs) {
                $this->validate([
                    'pdfs.*' => 'required|mimes:pdf',
                ]);
                foreach ($this->pdfs as $pdf) {
                    $documento = new Documentos();
                    $documento->nombre = $pdf->getClientOriginalName();
                    $documento->tipo = $pdf->extension();
                    $documento->dir = 'https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/' .  $pdf->store('documentos', 's3');
                    $documento->analisis_id = $analisis->id;
                    $documento->save();
                }
            }
        }

        $reserva = Reserva::where('consulta_id', $this->consulta->id)->first();
        $reserva->delete();
        return redirect()->route('historial.index', $this->consulta->paciente_id);
    }

    public function render()
    {
        $antecedentes = AntecedentesPatologicos::all();
        return view('livewire.paciente.consulta.lw-edit', compact('antecedentes'));
    }
}

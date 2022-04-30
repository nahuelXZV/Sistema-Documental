<?php

namespace App\Http\Livewire\Paciente\Consulta;

use App\Models\Analisis;
use App\Models\Anamnesis;
use App\Models\AnamnesisPatologicos;
use App\Models\Bitacora;
use App\Models\CausaTraumatismo;
use App\Models\Consulta;
use App\Models\DiagnosticoTratamiento;
use App\Models\Documentos;
use App\Models\Habitos;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LwShow extends Component
{

    public $consulta;
    public $anamnesis;
    public $anamnesis_patologicos;
    public $habitos;
    public $causa_traumatismo;
    public $diagnostico;
    public $analisis;
    public $documento = [];
    public $pdfs;
    public $imagenes;


    public function mount($id)
    {
        $this->consulta = Consulta::find($id);
        if (Anamnesis::where('consulta_id', $this->consulta->id)->exists()) {
            $this->anamnesis = Anamnesis::where('consulta_id', $this->consulta->id)->first();

            if (Habitos::where('anamnesis_id', $this->anamnesis->id)->exists()) {
                $this->habitos = Habitos::where('anamnesis_id', $this->anamnesis->id)->first();
            } else {
                $this->habitos = [];
            }
            if (AnamnesisPatologicos::where('anamnesis_id', $this->anamnesis->id)->exists()) {
                $this->anamnesis_patologicos = AnamnesisPatologicos::where('anamnesis_id', $this->anamnesis->id)->get();
            } else {
                $this->anamnesis_patologicos = [];
            }
            if (CausaTraumatismo::where('anamnesis_id', $this->anamnesis->id)->exists()) {
                $this->causa_traumatismo = CausaTraumatismo::where('anamnesis_id', $this->anamnesis->id)->first();
            } else {
                $this->causa_traumatismo = [];
            }
        }
        if (DiagnosticoTratamiento::where('consulta_id', $this->consulta->id)->exists()) {
            $this->diagnostico = DiagnosticoTratamiento::where('consulta_id', $this->consulta->id)->first();
        } else {
            $this->diagnostico = [];
        }
        if (Analisis::where('consulta_id', $this->consulta->id)->exists()) {
            $this->analisis = Analisis::where('consulta_id', $this->consulta->id)->first();
            if (Documentos::where('analisis_id', $this->analisis->id)->exists()) {
                $this->pdfs = Documentos::where('analisis_id', $this->analisis->id)->where('tipo', 'pdf')->get();
                $this->imagenes = Documentos::where('analisis_id', $this->analisis->id)->where('tipo', '!=', 'pdf')->get();
            } else {
                $this->pdfs = [];
                $this->imagenes = [];
            }
        } else {
            $this->analisis = [];
        }
        Bitacora::Bitacora(Auth::user()->medico->id, Auth::user()->name, 'Accedio a la consulta: ' . $this->consulta->id, $this->consulta->paciente_id);
    }

    public function render()
    {
        $habilitar = Reserva::where('consulta_id', $this->consulta->id)->first();
        return view('livewire.paciente.consulta.lw-show', compact('habilitar'));
    }
}

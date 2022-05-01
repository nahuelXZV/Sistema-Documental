<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Analisis;
use App\Models\Anamnesis;
use App\Models\AnamnesisPatologicos;
use App\Models\CausaTraumatismo;
use App\Models\Clinica;
use App\Models\Consulta;
use App\Models\DiagnosticoTratamiento;
use App\Models\Documentos;
use App\Models\Habitos;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class PdfConsultaController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    function Header($clinica)
    {
        $day = date("d-m-Y");
        $valido = date("d-m-Y", strtotime($day . "+ 10 days"));
        // Logo
        $this->fpdf->Image('Logo.png', 10, 8, 33);
        // Arial bold 15
        $this->fpdf->SetFont('Arial', 'I', 11);
        // Movernos a la derecha
        $this->fpdf->setX(140);
        // Título
        $this->fpdf->Cell(60, 10, utf8_decode($clinica->nombre . ' #: ' . $clinica->direccion), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Ciudad: ' . $clinica->ciudad), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Teléfono: ' . $clinica->telefono), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Correo Electrónico: ' . $clinica->email), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Creado el: ' . $day), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Válido hasta: ' . $valido), 0, 0, 'R');
        // Salto de línea
        $this->fpdf->Ln(15);
    }

    public function index($id)
    {
        $consulta = Consulta::find($id);
        $anamnesis = Anamnesis::where('consulta_id', $consulta->id)->first();
        if ($anamnesis) {
            $habitos = Habitos::where('anamnesis_id', $anamnesis->id)->first();
            $anamnesis_patologicos = AnamnesisPatologicos::where('anamnesis_id', $anamnesis->id)->get();
            $causa_traumatismo = CausaTraumatismo::where('anamnesis_id', $anamnesis->id)->first();
        } else {
            $habitos = [];
            $anamnesis_patologicos = [];
            $causa_traumatismo = [];
        }
        $diagnostico =  DiagnosticoTratamiento::where('consulta_id', $consulta->id)->first();
        $analisis =  Analisis::where('consulta_id', $consulta->id)->first();
        if ($analisis) {
            $imagenes = Documentos::where('analisis_id', $analisis->id)->where('tipo', '!=', 'pdf')->get();
        }
        $clinica = Clinica::find(1);

        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($clinica);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode('Consulta clínica '), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->datoconsulta($consulta);
        $this->generales($consulta, $anamnesis, $habitos, $anamnesis_patologicos, $causa_traumatismo);
        if ($diagnostico) {
            $this->diagnosticoytratamiento($diagnostico);
        }
        if ($analisis) {
            $this->analisisydocumentos($analisis, $imagenes);
        }

        $this->fpdf->Image('Firma.png', 55, 260, 100);
        $this->fpdf->Output();
    }

    public function datoconsulta($consulta)
    {
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->Cell(190, 10, utf8_decode('Datos de la consulta '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 8, utf8_decode('Medico encargado: ' . $consulta->ficha->medico->nombre . ' ' .  $consulta->ficha->medico->apellido), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Tipo de consulta: ' . $consulta->ficha->especialidad->nombre), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Paciente: ' . $consulta->paciente->nombre), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Documento: ' . $consulta->paciente->documento), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Dia: ' . $consulta->ficha->horario->dia), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Horario: ' . $consulta->ficha->horario->hora_inicio . ' - ' . $consulta->ficha->horario->hora_fin), 'B', 0, 'L');
        $this->fpdf->Ln(8);
    }

    public function generales($consulta, $anamnesis, $habitos, $anamnesis_patologicos, $causa_traumatismo)
    {
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        //Anmnesis
        if ($anamnesis) {
            $this->fpdf->SetFont('Arial', 'B', 11);
            $this->fpdf->Cell(190, 10, utf8_decode('Anamnesis '), 1, 0, 'L', 1);
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial', 'I', 9);
            $this->fpdf->SetDrawColor(230, 230, 230);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Motivo de ingreso: ' . $anamnesis->motivo_ingreso), 0, 'L', 0);
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Motivo de consulta: ' . $anamnesis->motivo_consulta), 0, 'L', 0);
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Antecedentes de la enfermedad actual: ' . $anamnesis->antecedentes_actuales), 0, 'L', 0);
            $this->fpdf->Ln(8);
        }

        // patologicos
        if (count($anamnesis_patologicos) > 0) {
            $this->fpdf->SetFont('Arial', 'B', 11);
            $this->fpdf->Cell(190, 10, utf8_decode('Antecedentes patologicos '), 1, 0, 'L', 1);
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial', 'I', 9);
            $this->fpdf->SetDrawColor(230, 230, 230);
            foreach ($anamnesis_patologicos as $key => $patologico) {
                $this->fpdf->Cell(190, 8, utf8_decode($key + 1 . ' = ' . $patologico->antecedentes_patologicos->nombre), 'B', 0, 'L');
                $this->fpdf->Ln(8);
            }
        }

        //Habitos
        if ($habitos) {
            $this->fpdf->SetFont('Arial', 'B', 11);
            $this->fpdf->Cell(190, 10, utf8_decode('Habitos '), 1, 0, 'L', 1);
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial', 'I', 9);
            $this->fpdf->SetDrawColor(230, 230, 230);
            $this->fpdf->Cell(190, 8, utf8_decode('Alimentarios: ' . $habitos->alimenticio), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Defecatorios: ' . $habitos->defecatorio), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Urinarios: ' . $habitos->urinario), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Actividad fisica: ' . $habitos->actividad_fisica), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Tiempo: ' . $habitos->tiempo), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Frecuencia: ' . $habitos->frecuencia), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Antecedentes de la enfermedad actual:: ' . $habitos->otros), 0, 'L', 0);
            $this->fpdf->Ln(8);
        }

        if ($causa_traumatismo) {
            $this->fpdf->SetFont('Arial', 'B', 11);
            $this->fpdf->Cell(190, 10, utf8_decode('Causa externa de traumatismo '), 1, 0, 'L', 1);
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial', 'I', 9);
            $this->fpdf->SetDrawColor(230, 230, 230);
            $this->fpdf->Cell(190, 8, utf8_decode('Tipo de causa: ' . $causa_traumatismo->tipo_causa), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Causa: ' . $causa_traumatismo->descripcion), 'B', 0, 'L');
            $this->fpdf->Ln(8);
            $this->fpdf->Cell(190, 8, utf8_decode('Sitio de ocurrencia:: ' . $causa_traumatismo->sitio_recurrencia), 'B', 0, 'L');
            $this->fpdf->Ln(8);
        }
    }

    public function diagnosticoytratamiento($diagnostico)
    {
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->Cell(190, 10, utf8_decode('Diagnostico y tratamiento '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->MultiCell(190, 8, utf8_decode('Principal: ' . $diagnostico->principal), 0, 'L', 0);
        if ($diagnostico->secundario) {
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Secundarios: ' . $diagnostico->secundario), 0, 'L', 0);
        }
        if (($diagnostico->justificacion)) {
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Justificacion: ' . $diagnostico->justificacion), 0, 'L', 0);
        }
        if ($diagnostico->plan_trabajo) {
            $this->fpdf->Ln(8);
            $this->fpdf->MultiCell(190, 8, utf8_decode('Plan de trabajo: ' . $diagnostico->plan_trabajo), 0, 'L', 0);
        }
        $this->fpdf->Ln(8);
        $this->fpdf->MultiCell(190, 8, utf8_decode('Tratamiento: ' . $diagnostico->tratamiento), 0, 'L', 0);
        $this->fpdf->Ln(8);
    }

    public function analisisydocumentos($analisis, $documentos)
    {
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->Cell(190, 10, utf8_decode('Analisis '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 8, utf8_decode('Nombre del análisis: ' . $analisis->tipo), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->Cell(190, 8, utf8_decode('Fecha del análisis: ' . $analisis->fecha), 'B', 0, 'L');
        $this->fpdf->Ln(8);
        $this->fpdf->MultiCell(190, 8, utf8_decode('Observaciones: ' . $analisis->descripcion), 0, 'L', 0);
        $this->fpdf->Ln(8);
        if ($documentos->count() > 0) {
            foreach ($documentos as $key => $documento) {
                $this->fpdf->Cell(190, 8, utf8_decode('Nombre del documento: ' . $documento->nombre), 'B', 0, 'L');
                $this->fpdf->Ln(8);
                $this->fpdf->Image($documento->dir, null, null, 120);
            }
        }
    }

    //-------------------------------------------------------------
    public function datos($id)
    {
        $consulta = Consulta::find($id);
        $anamnesis = Anamnesis::where('consulta_id', $consulta->id)->first();
        if ($anamnesis) {
            $habitos = Habitos::where('anamnesis_id', $anamnesis->id)->first();
            $anamnesis_patologicos = AnamnesisPatologicos::where('anamnesis_id', $anamnesis->id)->get();
            $causa_traumatismo = CausaTraumatismo::where('anamnesis_id', $anamnesis->id)->first();
        } else {
            $habitos = [];
            $anamnesis_patologicos = [];
            $causa_traumatismo = [];
        }

        $clinica = Clinica::find(1);

        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($clinica);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode('Consulta clínica '), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->datoconsulta($consulta);
        $this->generales($consulta, $anamnesis, $habitos, $anamnesis_patologicos, $causa_traumatismo);

        $this->fpdf->Image('Firma.png', 55, 260, 100);
        $this->fpdf->Output();
    }
    public function diagnostico($id)
    {
        $consulta = Consulta::find($id);
        $clinica = Clinica::find(1);
        $diagnostico =  DiagnosticoTratamiento::where('consulta_id', $consulta->id)->first();

        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($clinica);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode('Consulta clínica '), 0, 0, 'C');
        $this->fpdf->Ln(15);
        $this->datoconsulta($consulta);

        if ($diagnostico) {
            $this->diagnosticoytratamiento($diagnostico);
        }
        $this->fpdf->Image('Firma.png', 55, 260, 100);
        $this->fpdf->Output();
    }
    public function analisis($id)
    {
        $consulta = Consulta::find($id);
        $clinica = Clinica::find(1);
        $analisis =  Analisis::where('consulta_id', $consulta->id)->first();
        if ($analisis) {
            $imagenes = Documentos::where('analisis_id', $analisis->id)->where('tipo', '!=', 'pdf')->get();
        }

        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($clinica);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode('Consulta clínica '), 0, 0, 'C');
        $this->fpdf->Ln(15);
        $this->datoconsulta($consulta);

        if ($analisis) {
            $this->analisisydocumentos($analisis, $imagenes);
        }

        $this->fpdf->Image('Firma.png', 55, 260, 100);
        $this->fpdf->Output();
    }
}

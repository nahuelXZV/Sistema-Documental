<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Clinica;
use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Residencia;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    function Header($clinica)
    {
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
        $this->fpdf->Cell(60, 10, utf8_decode('Creado: ' . now()), 0, 0, 'R');
        // Salto de línea
        $this->fpdf->Ln(15);
    }

    public function historial($id)
    {
        $paciente = Paciente::find($id);
        $clinica = Clinica::find(1);
        $parentales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Padre')->first();
        $maternales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Madre')->first();
        $residencia = Residencia::find($id);
        $examen = ExamenFisico::find($id);

        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($clinica);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode('Historial Clínico '), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->generales($paciente);
        $this->residencia($residencia);
        if ($parentales) {
            $this->parentales($parentales, 'Datos del padre');
        }
        if ($maternales) {
            $this->parentales($maternales, 'Datos de la madre');
        }
        if ($examen) {
            $this->examenFisico($examen);
        }
        $this->fpdf->Image('Firma.png', 55, 260, 100);
        $this->fpdf->Output();
    }


    public function generales($paciente)
    {
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->Cell(190, 10, utf8_decode('Datos Generales '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Apellidos y Nombres: ' . $paciente->nombre), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Fecha de nacimiento: ' . $paciente->fecha_nacimiento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Tipo de documento: ' . $paciente->tipo_documento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Documento: ' . $paciente->documento), 'B', 0, 'L');

        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Telefono: ' . $paciente->telefono), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Sexo: ' . $paciente->sexo), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Estado civil: ' . $paciente->estado_civil), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 12, utf8_decode('Situacion laboral: ' . $paciente->situacion_laboral), 'B', 1, 'L');
        $this->fpdf->Ln(12);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190, 10, utf8_decode('Lugar de nacimiento '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Pais: ' . $paciente->pais), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Departamento: ' . $paciente->departamento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 12, utf8_decode('Nacionalidad: ' . $paciente->nacionalidad), 'B', 1, 'L');
        $this->fpdf->Ln(12);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190, 10, utf8_decode('Nivel educativo '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Nivel de estudio: ' . $paciente->nivel_educativo), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 12, utf8_decode('Año cursado: ' . $paciente->año_cursado), 'B', 1, 'L');
        $this->fpdf->Ln(12);
    }

    public function residencia($residencia)
    {
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190, 10, utf8_decode('Datos residenciales '), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Pais: ' . $residencia->pais), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Departamento: ' . $residencia->departamento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Barrio: ' . $residencia->barrio), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Dirección: ' . $residencia->direccion), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Nro de casa: ' . $residencia->nro_casa), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 12, utf8_decode('Referencia: ' . $residencia->referencia), 'B', 1, 'L');
        $this->fpdf->Ln(12);
    }

    public function parentales($parentales, $tipo)
    {
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190, 10, utf8_decode($tipo), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Apellido y Nombre: ' . $parentales->apellido . ' ' . $parentales->nombre), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Edad: ' . $parentales->edad), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Tipo de documento: ' . $parentales->tipo_documento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Documento: ' . $parentales->documento), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Estado civil: ' . $parentales->estado_civil), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Nivel de estudio: ' . $parentales->nivel_educativo), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Ocupacion: ' . $parentales->ocupacion), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->MultiCell(190, 10, utf8_decode('Otros: ' . $parentales->otros), 0, 'L', 0);
        $this->fpdf->Ln(10);
    }

    public function examenFisico($examen)
    {
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell(190, 10, utf8_decode('Examen Fisico'), 1, 0, 'L', 1);
        $this->fpdf->Ln(10);
        $this->fpdf->SetFont('Arial', 'I', 11);
        $this->fpdf->SetDrawColor(230, 230, 230);
        $this->fpdf->Cell(190, 10, utf8_decode('Pulsos: ' . $examen->pulsos), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('FR: ' . $examen->FR), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('FC: ' . $examen->FC), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('T° Axilar: ' . $examen->t_axilar), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Peso: ' . $examen->peso), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Talla: ' . $examen->talla), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('IMC: ' . $examen->imc), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->Cell(190, 10, utf8_decode('Estado Nutricional: ' . $examen->estado_nutricional), 'B', 0, 'L');
        $this->fpdf->Ln(10);
        $this->fpdf->MultiCell(190, 10, utf8_decode('Otros: ' . $examen->otros), 0, 'L', 0);
        $this->fpdf->Ln(10);
    }
}

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

    //https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZBAv-w7bwZw4KDWH9-RTnK56bsNpO-aqSUg&usqp=CAU
    public function historial($id)
    {
        $paciente = Paciente::find($id);
        $clinica = Clinica::find(1);
        $parentales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Padre')->first();
        $maternales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Madre')->first();
        $residencia = Residencia::find($id);
        $examen = ExamenFisico::find($id);
        $fecha = now();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, $paciente->nombre . ' ' . $paciente->apellido);
        $pdf->Output();
    }

    // show consulta
    public function all($id)
    {
        $paciente = Paciente::find($id);
        $clinica = Clinica::find(1);
        $parentales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Padre')->first();
        $maternales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Madre')->first();
        $residencia = Residencia::find($id);
        $examen = ExamenFisico::find($id);
        $fecha = now();
        $pdf = \PDF::loadView('pdf.historial', compact('paciente', 'clinica', 'fecha', 'parentales', 'residencia', 'examen', 'maternales'));
        return $pdf->stream('historial.pdf');
    }

    public function datos($id)
    {
    }

    public function diagnostico($id)
    {
    }

    public function analisis($id)
    {
    }
}

<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Clinica;
use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Residencia;
use Illuminate\Http\Request;

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
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf.historial', compact('paciente', 'clinica', 'fecha', 'parentales', 'residencia', 'examen', 'maternales'));
        return $pdf->download('historial.pdf');
    }

    // show consulta
    public function all($id)
    {
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

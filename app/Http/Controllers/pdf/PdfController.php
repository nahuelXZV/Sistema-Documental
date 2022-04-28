<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Clinica;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PdfController extends Controller
{


    public function historial($id)
    {
        $paciente = Paciente::find($id);
        $clinica = Clinica::find(1);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf.historial', compact('paciente', 'clinica'));
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

<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinica;
use App\Models\DatosParentales;
use App\Models\ExamenFisico;
use App\Models\Paciente;
use App\Models\Residencia;

class HistorialController extends Controller
{
    public function index($id)
    {
        return view('pacientes.historial.historial', compact('id'));
    }
    public function create($id, $reservaid)
    {
        return view('pacientes.historial.create', compact('id', 'reservaid'));
    }
    public function edit($id)
    {
        return view('pacientes.historial.edit', compact('id'));
    }

    public function historial($id)
    {
        $paciente = Paciente::find($id);
        $clinica = Clinica::find(1);
        $parentales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Padre')->first();
        $maternales = DatosParentales::where('paciente_id', $id)->where('vinculo', 'Madre')->first();
        $residencia = Residencia::find($id);
        $examen = ExamenFisico::find($id);
        $fecha = now();
        $pdf = \PDF::loadView('pdf.historial', compact('paciente', 'clinica', 'fecha', 'parentales', 'residencia', 'examen', 'maternales'));
        return $pdf->download('historial.pdf');
    }
}

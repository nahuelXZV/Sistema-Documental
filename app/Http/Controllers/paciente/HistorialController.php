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
    public function __construct()
    {
        $this->middleware(['role:medico|paciente']);
    }

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
}

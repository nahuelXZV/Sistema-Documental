<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return view('pacientes.paciente_reservar.index');
    }

    public function create()
    {
        return view('pacientes.paciente_reservar.create');
    }
}

<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

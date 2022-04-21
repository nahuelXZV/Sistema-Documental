<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function index()
    {
        return view('pacientes.reservas.reservas');
    }
    public function create()
    {
        return view('pacientes.reservas.create');
    }
    public function edit($id)
    {
        return view('pacientes.reservas.edit', compact('id'));
    }
}

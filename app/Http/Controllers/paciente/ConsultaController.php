<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:medico']);
    }
    public function index()
    {
        return view('pacientes.consulta.consultas');
    }
    public function create()
    {
        return view('pacientes.consulta.create');
    }
    public function edit($id)
    {
        return view('pacientes.consulta.edit', compact('id'));
    }
    public function show($id)
    {
        return view('pacientes.consulta.shoq', compact('id'));
    }
}

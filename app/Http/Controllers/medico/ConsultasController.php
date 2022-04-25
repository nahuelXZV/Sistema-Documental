<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:medico']);
    }
    public function index()
    {
        return view('medico.consultas.consultas');
    }
    public function create()
    {
        return view('medico.consultas.create');
    }
    public function edit($id)
    {
        return view('medico.consultas.edit', compact('id'));
    }
}

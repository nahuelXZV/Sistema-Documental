<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicoHorario extends Controller
{
    public function index()
    {
        return view('medico.medicohorario.medicohorario');
    }
    public function create()
    {
        return view('medico.medicohorario.create');
    }
    public function edit($id)
    {
        return view('medico.medicohorario.edit', compact('id'));
    }
}

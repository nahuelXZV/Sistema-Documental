<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        return view('medico.horarios.horarios');
    }
    public function create()
    {
        return view('medico.horarios.create');
    }
    public function edit($id)
    {
        return view('medico.horarios.edit', compact('id'));
    }
}

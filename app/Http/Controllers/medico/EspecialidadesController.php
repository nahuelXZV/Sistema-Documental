<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admi']);
    }
    public function index()
    {
        return view('medico.especialidades.especialidades');
    }
    public function create()
    {
        return view('medico.especialidades.create');
    }
    public function edit($id)
    {
        return view('medico.especialidades.edit', compact('id'));
    }
}

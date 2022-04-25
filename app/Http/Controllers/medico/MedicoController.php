<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admi']);
    }
    public function index()
    {
        return view('medico.medico.medico');
    }
    public function create()
    {
        return view('medico.medico.create');
    }
    public function edit($id)
    {
        return view('medico.medico.edit', compact('id'));
    }
}

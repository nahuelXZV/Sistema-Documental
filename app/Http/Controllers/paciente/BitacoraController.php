<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:medico|paciente']);
    }
    public function index($id)
    {
        return view('pacientes.bitacora.bitacora', compact('id'));
    }
}

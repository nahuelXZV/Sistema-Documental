<?php

namespace App\Http\Controllers\paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index()
    {
        return view('pacientes.bitacora.bitacora');
    }
}

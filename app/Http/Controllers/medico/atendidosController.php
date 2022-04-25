<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class atendidosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:medico']);
    }
    public function index()
    {
        return view('medico.atendidos.atendidos');
    }
}

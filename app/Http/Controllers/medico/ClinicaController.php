<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicaController extends Controller
{


    public function  index()
    {
        return view('medico.clinica.clinica');
    }

    public function  edit($id)
    {
        return view('medico.clinica.edit', compact('id'));
    }
}

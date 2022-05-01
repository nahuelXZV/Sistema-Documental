<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Paciente as PacienteResource;
use App\Models\Paciente;

class ApiPacienteController extends BaseController
{

    public function show($id)
    {
        $paciente = Paciente::find($id);
        if (is_null($paciente)) {
            return $this->sendError('Paciente does not exist.');
        }
        return $this->sendResponse(new PacienteResource($paciente), 'Paciente encontrado.');
    }
}

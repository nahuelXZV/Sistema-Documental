<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Especialidad as EspecialidadResource;
use App\Http\Resources\Horario as HorarioResource;
use App\Http\Resources\Medico as MedicoResource;
use App\Http\Resources\Reserva as ReservaResource;
use App\Http\Resources\ListaReserva as ListaReservaResource;
use Validator;

use App\Models\EspecialidadMedica;
use App\Models\Ficha;
use App\Models\Reserva;

class ApiReservaController extends BaseController
{
    public function especialidades()
    {
        $especialidades = EspecialidadMedica::all();
        if (is_null($especialidades)) {
            return $this->sendError('Especialidades does not exist.');
        }
        return $this->sendResponse(EspecialidadResource::collection($especialidades), 'Especialidades encontrados.');
    }

    public function medicos($id)
    {
        $fichas = Ficha::where('especialidad_id', $id)->get();
        if (is_null($fichas)) {
            return $this->sendError('No existe esa especialidad.');
        }
        $medico = Ficha::join('medicos', 'fichas.medico_id', '=', 'medicos.id')
            ->select('medicos.*')
            ->where('especialidad_id', $id)->get();
        if (is_null($medico)) {
            return $this->sendError('Sin medicos disponibles.');
        }
        return $this->sendResponse(MedicoResource::collection($medico), 'Medicos encontrados.');
    }

    public function horarios($medico_id, $especialidad_id)
    {
        $fichas = Ficha::where('medico_id', $medico_id)
            ->where('especialidad_id', $especialidad_id)->get();
        if (is_null($fichas)) {
            return $this->sendError('No existe ese medico.');
        }
        $horarios = Ficha::join('medicos', 'fichas.medico_id', '=', 'medicos.id')
            ->join('horarios', 'fichas.horario_id', '=', 'horarios.id')
            ->select('horarios.*')
            ->where('especialidad_id', $especialidad_id)
            ->where('medico_id', $medico_id)->get();
        if (is_null($horarios)) {
            return $this->sendError('Sin horarios disponibles.');
        }
        return $this->sendResponse(HorarioResource::collection($horarios), 'Horarios encontrados.');
    }

    public function reservar(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'medico_id' => 'required',
            'especialidad_id' => 'required',
            'horario_id' => 'required',
            'fecha_reserva' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $ficha = Ficha::where('medico_id', $request->medico_id)
            ->where('especialidad_id', $request->especialidad_id)
            ->where('horario_id', $request->horario_id)->first();
        if (is_null($ficha)) {
            return $this->sendError('Ficha no existe.');
        }

        $reserva = Reserva::create([
            'fecha_reserva' => $request->fecha_reserva,
            'fecha_creacion' => now(),
            'ficha_id' => $ficha->id,
            'user_id' => $request->user_id,
            'consulta_id' => null,
        ]);
        return $this->sendResponse(new ReservaResource($reserva), 'Reserva creada.');
    }


    public function reservas()
    {
        $reservas = Reserva::where('user_id', auth()->user()->id)->get();
        if (is_null($reservas)) {
            return $this->sendError('Reservas no existe.');
        }
        if ($reservas->count() == 0) {
            return $this->sendError('No hay reservas.');
        }
        $ListaReserva = [];
        foreach ($reservas as $key => $reserva) {
            $datos = [
                "id" => $reserva->id,
                "fecha_reserva" => $reserva->fecha_reserva,
                "fecha_creacion" => $reserva->fecha_creacion,
                "especialidad" => $reserva->ficha->especialidad->nombre,
                "medico" => $reserva->ficha->medico->nombre,
                "hora_inicio" => $reserva->ficha->horario->hora_inicio,
                "hora_fin" => $reserva->ficha->horario->hora_fin,
                "dia" => $reserva->ficha->horario->dia
            ];
            array_push($ListaReserva, $datos);
        }
        return $this->sendResponse($ListaReserva, 'Reservas encontradas.');
    }

    public function cancelar($id)
    {
        $reserva = Reserva::find($id);
        if (is_null($reserva)) {
            return $this->sendError('Reserva no existe.');
        }
        $reserva->delete();
        return $this->sendResponse([], 'Reserva eliminada.');
    }
}

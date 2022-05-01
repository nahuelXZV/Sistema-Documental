<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListaReserva extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fecha_reserva' => $this->fecha_reserva,
            'fecha_creacion' => $this->fecha_creacion,
            'especialidad' => $this->especialidad,
            'medico' => $this->medico,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'dia' => $this->dia,
        ];
    }
}

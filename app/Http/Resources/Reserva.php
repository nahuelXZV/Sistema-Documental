<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reserva extends JsonResource
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
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_reserva' => $this->fecha_reserva,
            'ficha_id' => $this->ficha_id,
            'user_id' => $this->user_id,
            'consulta_id' => $this->consulta_id,
        ];
    }
}

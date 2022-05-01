<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paciente extends JsonResource
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
            'nombre' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'sexo' => $this->sexo,
            'telefono' => $this->telefono,
            'pais' => $this->pais,
            'departamento' => $this->departamento,
            'nacionalidad' => $this->nacionalidad,
            'estado_civil' => $this->estado_civil,
            'nivel_educativo' => $this->nivel_educativo,
            'año_cursado' => $this->año_cursado,
            'situacion_laboral' => $this->situacion_laboral,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}

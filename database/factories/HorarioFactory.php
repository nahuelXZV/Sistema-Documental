<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hora = $this->faker->time('H:i');
        return [
            Horario::create([
                'dia' => $this->faker->randomElement(['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']),
                'hora_inicio' => $hora,
                'hora_fin' => $this->faker->time('H:i', $hora, '+1 hour'),
            ]),
        ];
    }
}

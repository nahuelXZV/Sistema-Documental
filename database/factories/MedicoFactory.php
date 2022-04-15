<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firt = $this->faker->firstName;
        $last = $this->faker->lastName;
        $user = User::create([
            'name' => $firt . ' ' . $last,
            'email' => $this->faker->email(),
            'password' => bcrypt('12345678'),
        ])->assignRole('Médico');
        return [
            Medico::create([
                'nombre' => $firt,
                'apellido' => $last,
                'sexo' => $this->faker->randomElement(['M', 'F']),
                'telefono' => $this->faker->phoneNumber(),
                'email' => $user->email,
                'user_id' => $user->id,
                'clinica_id' => 1,
            ])
        ];
    }
}

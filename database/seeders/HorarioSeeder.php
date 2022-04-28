<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'dia' => 'Lunes',
            'hora_inicio' => '08:00',
            'hora_fin' => '12:00',
        ]);
        Horario::create([
            'dia' => 'Martes',
            'hora_inicio' => '14:00',
            'hora_fin' => '18:00',
        ]);
        Horario::create([
            'dia' => 'Miercoles',
            'hora_inicio' => '20:00',
            'hora_fin' => '22:00',
        ]);
        Horario::create([
            'dia' => 'Jueves',
            'hora_inicio' => '10:00',
            'hora_fin' => '11:00',
        ]);
    }
}

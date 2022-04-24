<?php

namespace Database\Seeders;

use App\Models\Clinica;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(ClinicaSeeder::class);
        $this->call(EspecialidadMedicaSeeder::class);
        //$this->call(MedicoSeeder::class);
        //$this->call(HorarioSeeder::class);
        User::create([
            'name' => 'Nahuel Zalazar',
            'email' => 'nahuel@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'admi',
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Sofia Mendoza',
            'email' => 'sofia@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'medico',
        ])->assignRole('Médico');
    }
}

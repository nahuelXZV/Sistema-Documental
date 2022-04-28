<?php

namespace Database\Seeders;

use App\Models\AntecedentesPatologicos;
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
        $this->call(AntecedentesPatologicosSeeder::class);
        $this->call(HorarioSeeder::class);
        User::create([
            'name' => 'Nahuel Zalazar',
            'email' => 'nahuel@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'admi',
        ])->assignRole('admi');
        $id = Medico::create([
            'nombre' => 'Lucas',
            'apellido' => 'Mendoza',
            'sexo' => 'M',
            'telefono' => '12345678',
            'email' => 'lucas@gmail.com',
        ]);
        User::create([
            'name' => 'Lucas Mendoza',
            'email' => 'lucas@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'medico',
            'medico_id' => $id->id,
            'paciente_id' => null
        ])->assignRole('medico');
        User::create([
            'name' => 'Sofia Flores',
            'email' => 'sofia@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'paciente',
            'medico_id' => null,
            'paciente_id' => null,
        ])->assignRole('paciente');
        User::create([
            'name' => 'Fernando Rocha',
            'email' => 'fernando@gmail.com',
            'password' => bcrypt('12345678'),
            'tipo_user' => 'paciente',
            'medico_id' => null,
            'paciente_id' => null,
        ])->assignRole('paciente');
    }
}

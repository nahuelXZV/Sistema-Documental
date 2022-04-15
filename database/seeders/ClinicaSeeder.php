<?php

namespace Database\Seeders;

use App\Models\Clinica;
use Illuminate\Database\Seeder;

class ClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clinica::create([
            'nombre' => 'Clinica de la Salud',
            'direccion' => 'Calle 1',
            'telefono' => '75698954',	
            'email' => 'clinicaSalud@gmail.com',
            'region_sanitaria' => 'Region 1',
            'ciudad' => 'Santa Cruz de la Sierra',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\EspecialidadMedica;
use Illuminate\Database\Seeder;

class EspecialidadMedicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EspecialidadMedica::create([
            'nombre' => 'Medicina General',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Medicina Interna',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Medicina Familiar',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Pediatria',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Odontologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Ginecologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Oftalmologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Cardiologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Neumologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Traumatologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Urologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Dermatologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Otorrinolaringologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Neurologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Gastroenterologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Endocrinologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Nefrologia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Cirugia',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Cirugia General',
        ]);
        EspecialidadMedica::create([
            'nombre' => 'Psiquiatria',
        ]);
    }
}

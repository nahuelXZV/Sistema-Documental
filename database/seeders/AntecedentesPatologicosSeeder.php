<?php

namespace Database\Seeders;

use App\Models\AntecedentesPatologicos;
use Illuminate\Database\Seeder;

class AntecedentesPatologicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AntecedentesPatologicos::create([
            'nombre' => 'Cardiovasculares'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Respiratorios'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Digestivos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Genitourinarios'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Osteoartromuscular'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Hemolinfopoyético'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Endocrinos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Neurosiquiátricos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Psicológicos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Odontológicos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Audiovisuales'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Alérgicos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Infecciosos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Neoplásicos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Traumatismos'
        ]);
        AntecedentesPatologicos::create([
            'nombre' => 'Quemaduras'
        ]);
    }
}

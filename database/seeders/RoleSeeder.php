<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admi = Role::create(['name' => 'Administrador']);
        $paciente = Role::create(['name' => 'Paciente']);
        $medico = Role::create(['name' => 'Médico']);

        Permission::create([
            'name' => 'pacientes',
            'descripcion' => 'Gestionar pacientes'
        ])->syncRoles([$admi, $medico]);
        Permission::create([
            'name' => 'clinica',
            'descripcion' => 'Gestionar clínica'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'medicos',
            'descripcion' => 'Gestionar médicos'
        ])->syncRoles([$admi, $medico]);
        Permission::create([
            'name' => 'especialidades',
            'descripcion' => 'Gestionar especialidades'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'horarios',
            'descripcion' => 'Gestionar horarios'
        ])->syncRoles([$admi, $medico]);

        
    }
}

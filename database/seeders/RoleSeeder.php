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
        $admi = Role::create(['name' => 'admi']);
        $paciente = Role::create(['name' => 'paciente']);
        $medico = Role::create(['name' => 'medico']);

        Permission::create([
            'name' => 'usuarios',
            'descripcion' => 'Gestionar pacientes'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'clinica',
            'descripcion' => 'Gestionar clínica'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'medicos',
            'descripcion' => 'Gestionar médicos'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'especialidades',
            'descripcion' => 'Gestionar especialidades'
        ])->syncRoles([$admi]);
        Permission::create([
            'name' => 'horarios',
            'descripcion' => 'Gestionar horarios'
        ])->syncRoles([$admi]);
    }
}

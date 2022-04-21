<?php

namespace App\Http\Livewire\Administracion\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LwCreate extends Component
{
    public $name;
    public $permisosR = [];

    public function add()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $role = Role::create(['name' => $this->name, 'guard_name' => 'web']);
        foreach ($this->permisosR as $permi) {
            $role->givePermissionTo($permi);
        }
        $role->update();
        return redirect()->route('roles.index');
    }
    public function render()
    {
        $permisos = Permission::all();

        return view('livewire.administracion.role.lw-create', compact('permisos'));
    }
    // create a new method

}

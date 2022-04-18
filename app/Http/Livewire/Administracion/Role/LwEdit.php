<?php

namespace App\Http\Livewire\Administracion\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LwEdit extends Component
{
    public $role;
    public $name;
    public $permisosR = [];
    public $selectPermissions;

    public function mount($id)
    {
        $this->role = Role::find($id);
        $this->name = $this->role->name;
        $this->selectPermissions  = $this->role->getAllPermissions()->pluck('id')->toArray();
        foreach ($this->selectPermissions as $selectPermission) {
            $this->permisosR[$selectPermission] = $selectPermission;
        }
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->role->id,
        ]);
        $this->role->name = $this->name;
        foreach ($this->selectPermissions as $permi) {
            $this->role->revokePermissionTo($permi);
        }
        foreach ($this->permisosR as $permi) {
            $this->role->givePermissionTo($permi);
        }
        $this->role->update();
        return redirect()->route('roles.index');
    }

    public function render()
    {
        $permisos = Permission::all();
        return view('livewire.administracion.role.lw-edit', compact('permisos'));
    }
}

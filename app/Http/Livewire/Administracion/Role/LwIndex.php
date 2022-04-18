<?php

namespace App\Http\Livewire\Administracion\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'name';
    public $sort = 'name';
    public $direction = 'asc';

    public function updatingAttribute()
    {
        $this->resetPage();
    }
    public function order($type)
    {
        if ($this->type == $type) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->type = $type;
            $this->direction = 'asc';
        }
    }


    public function delete($id)
    {
        $role = ModelsRole::find($id);
        $role->delete();
        $this->render();
    }


    public function render()
    {
        switch ($this->type) {
            case 'id':
                $roles = ModelsRole::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $roles = ModelsRole::where('name', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.administracion.role.lw-index', compact('roles'));
    }
}

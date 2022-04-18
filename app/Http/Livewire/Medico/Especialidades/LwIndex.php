<?php

namespace App\Http\Livewire\Medico\Especialidades;

use App\Models\EspecialidadMedica;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'id';
    public $direction = 'asc';


    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    //Metodo de ordenado
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
        $especialidad = EspecialidadMedica::find($id);
        $especialidad->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'id':
                $especialidades = EspecialidadMedica::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;

            default:
                $especialidades = EspecialidadMedica::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }

        return view('livewire.medico.especialidades.lw-index', compact('especialidades'));
    }
}

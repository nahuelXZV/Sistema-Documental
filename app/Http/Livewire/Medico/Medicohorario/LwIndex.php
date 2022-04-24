<?php

namespace App\Http\Livewire\Medico\Medicohorario;

use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
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
        $ficha = Ficha::find($id);
        $ficha->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'medico':
                $horarios = Ficha::join('medicos', 'medicos.id', '=', 'fichas.medico_id')
                    ->select('fichas.*')
                    ->where('medicos.nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'especialidad':
                $horarios = Ficha::join('especialidad_medicas', 'especialidad_medicas.id', '=', 'fichas.especialidad_id')
                    ->select('fichas.*')
                    ->where('especialidad_medicas.nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $horarios = Ficha::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.medico.medicohorario.lw-index', compact('horarios'));
    }
}

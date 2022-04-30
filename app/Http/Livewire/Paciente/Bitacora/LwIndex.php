<?php

namespace App\Http\Livewire\Paciente\Bitacora;

use App\Models\Bitacora;
use App\Models\Paciente;
use Livewire\Component;
use OwenIt\Auditing\Models\Audit;
use Livewire\WithPagination;

class LwIndex extends Component
{
    public $paciente;
    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'created_at';
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
    public function mount($id)
    {
        $this->paciente = Paciente::find($id);
    }

    public function render()
    {

        $auditorias = Bitacora::where('created_at', 'like', '%' . $this->attribute . '%')
            ->where('paciente_id', $this->paciente->id)
            ->orderBy($this->sort, 'desc')
            ->paginate($this->pagination);
        return view('livewire.paciente.bitacora.lw-index', compact('auditorias'));
    }
}

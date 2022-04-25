<?php

namespace App\Http\Livewire\Paciente\Bitacora;

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
    public function mount($id)
    {
        $this->paciente = Paciente::find($id);
    }

    public function render()
    {
        switch ($this->type) {
            case 'medico':
                $auditorias = Audit::join('users', 'users.id', '=', 'audits.user_id')
                    ->join('medicos', 'medicos.id', '=', 'users.medico_id')
                    ->where('medicos.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('auditable_id', $this->paciente->id)
                    ->paginate($this->pagination);
                break;
            case 'evento':
                $auditorias = Audit::where('event', 'like', '%' . $this->attribute . '%')
                    ->where('auditable_id', $this->paciente->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $auditorias = Audit::where('created_at', 'like', '%' . $this->attribute . '%')
                    ->where('auditable_id', $this->paciente->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.paciente.bitacora.lw-index', compact('auditorias'));
    }
}

<?php

namespace App\Http\Livewire\Medico\Consulta;

use App\Models\Consulta;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


    public function eyes($id)
    {
        $reserva = Reserva::find($id);
        if ($reserva->user->paciente_id == null) {
            return redirect()->route('historial.create', [$reserva->user_id, $reserva->id]);
        } else {
            return redirect()->route('historial.index', $reserva->user->paciente_id);
        }
    }

    public function render()
    {
        switch ($this->type) {
            case 'paciente':
                $consultas = Reserva::join('users', 'users.id', '=', 'reservas.user_id')
                    ->join('fichas', 'fichas.id', '=', 'reservas.ficha_id')
                    ->join('medicos', 'fichas.medico_id', '=', 'medicos.id')
                    ->select('reservas.*')
                    ->where('users.name', 'like', '%' . $this->attribute . '%')
                    ->where('medicos.id', '=', Auth()->user()->medico->id)
                    ->orderBy('users.name', $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'especialidad':
                $consultas = Reserva::join('fichas', 'fichas.id', '=', 'reservas.ficha_id')
                    ->join('especialidad_medicas', 'fichas.especialidad_id', '=', 'especialidad_medicas.id')
                    ->join('medicos', 'fichas.medico_id', '=', 'medicos.id')
                    ->select('reservas.*')
                    ->where('especialidad_medicas.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('medicos.id', '=', Auth()->user()->medico->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $consultas = Reserva::join('fichas', 'fichas.id', '=', 'reservas.ficha_id')
                    ->join('medicos', 'fichas.medico_id', '=', 'medicos.id')
                    ->select('reservas.*')
                    ->where('medicos.id', '=', Auth()->user()->medico->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.medico.consulta.lw-index', compact('consultas'));
    }
}

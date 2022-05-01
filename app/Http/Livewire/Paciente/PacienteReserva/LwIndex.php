<?php

namespace App\Http\Livewire\Paciente\PacienteReserva;

use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'created_at';
    public $direction = 'desc';


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
        $reserva = Reserva::find($id);
        $reserva->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'medico':
                $reservas = Reserva::join('fichas', 'fichas.id', '=', 'reservas.ficha_id')
                    ->join('medicos', 'fichas.medico_id', '=', 'medicos.id')
                    ->select('reservas.*')
                    ->where('medicos.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('reservas.user_id', auth()->user()->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'especialidad':
                $reservas = Reserva::join('fichas', 'fichas.id', '=', 'reservas.ficha_id')
                    ->join('especialidad_medicas', 'fichas.especialidad_id', '=', 'especialidad_medicas.id')
                    ->select('reservas.*')
                    ->where('especialidad_medicas.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('reservas.user_id', auth()->user()->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $reservas = Reserva::where('id', 'like', '%' . $this->attribute . '%')
                    ->where('reservas.user_id', auth()->user()->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.paciente.paciente-reserva.lw-index', compact('reservas'));
    }
}

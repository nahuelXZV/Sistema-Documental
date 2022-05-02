<?php

namespace App\Http\Livewire\Paciente\Historial;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithPagination;

class LwRealizadas extends Component
{
    use WithPagination;
    public $paciente;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'fecha';
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

    public function mount($id)
    {
        $this->paciente = Paciente::find($id);
    }

    public function render()
    {
        switch ($this->type) {
            case 'especialidad':
                $consultas = Consulta::join('fichas', 'fichas.id', '=', 'consultas.ficha_id')
                    ->join('especialidad_medicas', 'especialidad_medicas.id', '=', 'fichas.especialidad_id')
                    ->select('consultas.*')
                    ->where('especialidad_medicas.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('consultas.paciente_id', '=', $this->paciente->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'medico':
                $consultas = Consulta::join('fichas', 'fichas.id', '=', 'consultas.ficha_id')
                    ->join('medicos', 'medicos.id', '=', 'fichas.medico_id')
                    ->select('consultas.*')
                    ->where('medicos.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('consultas.paciente_id', '=', $this->paciente->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $consultas = Consulta::where('fecha', 'like', '%' . $this->attribute . '%')
                    ->where('paciente_id', $this->paciente->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.paciente.historial.lw-realizadas', compact('consultas'));
    }
}

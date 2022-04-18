<?php

namespace App\Http\Livewire\Administracion\Usuario;

use App\Models\Medico;
use App\Models\User;
use Livewire\Component;

class LwEdit extends Component
{
    public $user;
    public $name;
    public $email;
    public $tipo_user;
    public $id_medico = null;
    public $id_user = null;

    //Iniciador
    public function mount($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->tipo_user = $this->user->tipo_user;
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->tipo_user = $this->tipo_user;
        if ($this->id_medico) {
            $this->user->id_medico = $this->id_medico;
        } else if ($this->id_user) {
            $this->user->id_user = $this->id_user;
        }
        $this->user->update();
        return redirect()->route('usuario.index');
    }
    public function limpiar()
    {
        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        $medicos = Medico::all();
        return view('livewire.administracion.usuario.lw-edit', compact('medicos'));
    }
}

<?php

namespace App\Http\Livewire\Administracion\Usuario;

use App\Models\Medico;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{

    public $name;
    public $email;
    public $password;
    public $tipo_user = 'medico';
    public $id_medico;
    public $id_user = null;

    protected $rules = [
        'password' => 'required',
        'email' => 'required|unique:users',
        'name' => 'required',
    ];

    public function add()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'tipo_user' => $this->tipo_user,
            'id_medico' => $this->id_medico,
            'id_user' => $this->id_user,
        ]);
        $this->emitTo('LwIndex', 'success');
        return redirect()->route('usuario.index');
    }

    public function cerrar()
    {
        return view('administracion.usuarios.usuario');
    }

    public function limpiar()
    {
        $this->reset(['name', 'email', 'password']);
    }
    public function render()
    {
        $medicos = Medico::all();
        return view('livewire.administracion.usuario.lw-create', compact('medicos'));
    }
}

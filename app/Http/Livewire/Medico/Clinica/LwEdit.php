<?php

namespace App\Http\Livewire\Medico\Clinica;

use App\Models\Clinica;
use Livewire\Component;

class LwEdit extends Component
{
    public $clinica;
    public $nombre;
    public $direccion;
    public $telefono;
    public $email;
    public $region_sanitaria;
    public $ciudad;
    
    public function mount($id)
    {
        $this->clinica = Clinica::find($id);
        $this->nombre = $this->clinica->nombre;
        $this->direccion = $this->clinica->direccion;
        $this->telefono = $this->clinica->telefono;
        $this->email = $this->clinica->email;
        $this->region_sanitaria = $this->clinica->region_sanitaria;
        $this->ciudad = $this->clinica->ciudad;
    }
    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'region_sanitaria' => 'required',
            'ciudad' => 'required',
        ]);
        $this->clinica->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'region_sanitaria' => $this->region_sanitaria,
            'ciudad' => $this->ciudad,
        ]);
        return redirect()->route('clinica.index');
    }
    public function render()
    {
        return view('livewire.medico.clinica.lw-edit');
    }
}

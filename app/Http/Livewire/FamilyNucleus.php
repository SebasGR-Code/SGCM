<?php

namespace App\Http\Livewire;

use App\Models\Nucleo;
use App\Models\Paciente;
use App\Models\User;
use Livewire\Component;

class FamilyNucleus extends Component
{
    public $user;
    public $nombre, $apellidos, $tipo_identificacion, $num_identificacion, $rh;
    public $genero, $fecha_nacimiento, $relacion; 
    
    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function saveFamily()
    {
        $this->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $paciente = new Paciente();
        $paciente->apellidos = $this->apellidos;
        $paciente->tipo_identificacion = $this->tipo_identificacion;
        $paciente->num_identificacion = $this->num_identificacion;
        $paciente->rh = $this->rh;
        $paciente->nombre = $this->nombre;
        $paciente->genero = $this->genero;
        $paciente->fecha_nacimiento = $this->fecha_nacimiento;
        $paciente->save();

        $nucleo = new Nucleo();
        $nucleo->user_id = $this->user->id;
        $nucleo->paciente_id = $paciente->id;
        $nucleo->relacion = $this->relacion;
        $nucleo->save();

        $this->resetExcept('user');
        $this->emit('swal', 'success', 'Se ha creado correctamente');
    }

    public function activate(Nucleo $nucleo)
    {
        $nucleo->estado = 1;
        $nucleo->save();

        $this->emit('swal', 'success', 'Se cambio el estado');
    }

    public function deactivate(Nucleo $nucleo)
    {
        $nucleo->estado = 0;
        $nucleo->save();

        $this->emit('swal', 'success', 'Se cambio el estado');
    }

    public function getFamiliaresProperty()
    {
        return $this->user ? $this->user->familiares()->get() : [];
    }

    public function render()
    {
        return view('livewire.family-nucleus')
        ->extends('plantilla.plantilla')
        ->section('contenido');
    }
}

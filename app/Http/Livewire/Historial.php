<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Paciente;
use Livewire\Component;

class Historial extends Component
{
    public $n_documento;
    public $paciente;
    public $search_cita;

    public function search()
    {
        $this->paciente = Paciente::where('num_identificacion', $this->n_documento)->first();
        
        if (empty($this->paciente)) {
            $this->emit('swal', 'error', 'No se encontró ningun afiliado con esta identificación');
        }
    }

    public function getCitasProperty()
    {
        return Cita::when($this->paciente, function ($query) {
            $query->where('paciente_id', $this->paciente->id);
            $query->where(function ($query) {
                $query->where('start','like','%'.$this->search_cita.'%')
                ->orWhere('title','like','%'.$this->search_cita.'%');
            });
        })->get() ?? [];
    }

    public function render()
    {
        return view('livewire.historial')
        ->extends('plantilla.plantilla')
        ->section('contenido');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\General;
use Livewire\Component;

class MedicaGeneral extends Component
{
    public $cita;
    public $motivo, $alergicos, $quirurgicos, $otros;
    public $fiebre, $tos, $cansancio, $dolor_garganta, $dolor_cabeza, $perdida, $dificultad, $sintoma_otro;
    public $aspecto_general, $peso, $talla, $tension_arterial, $frecuencia_cardiaca, $frecuencia_respiratoria, $masa_corporal, $temperatura;
    public $cabeza_cuello, $ojos, $cardiaco, $pulmonar, $abdomen, $mental;
    public $diagnostico_principal, $analisis_plan;

    public function mount($id)
    {
        $this->cita = Cita::find($id);
    }

    public function newData()
    {
        $this->validate([
            'motivo' => 'required',
            'diagnostico_principal' => 'required',
            'analisis_plan' => 'required'
        ]);

        $general = new General();
        $general->motivo = $this->motivo;
        $general->alergicos = $this->alergicos;
        $general->quirurgicos = $this->quirurgicos;
        $general->otros = $this->otros;
        $general->fiebre = $this->fiebre;
        $general->tos = $this->tos;
        $general->cansancio = $this->cansancio;
        $general->dolor_garganta = $this->dolor_garganta;
        $general->dolor_cabeza = $this->dolor_cabeza;
        $general->perdida = $this->perdida;
        $general->dificultad = $this->dificultad;
        $general->sintoma_otro = $this->sintoma_otro;
        $general->aspecto_general = $this->aspecto_general;
        $general->peso = $this->peso;
        $general->talla = $this->talla;
        $general->tension_arterial = $this->tension_arterial;
        $general->frecuencia_cardiaca = $this->frecuencia_cardiaca;
        $general->frecuencia_respiratoria = $this->frecuencia_respiratoria;
        $general->masa_corporal = $this->masa_corporal;
        $general->temperatura = $this->temperatura;
        $general->cabeza_cuello = $this->cabeza_cuello;
        $general->ojos = $this->ojos;
        $general->cardiaco = $this->cardiaco;
        $general->pulmonar = $this->pulmonar;
        $general->abdomen = $this->abdomen;
        $general->mental = $this->mental;
        $general->diagnostico_principal = $this->diagnostico_principal;
        $general->analisis_plan = $this->analisis_plan;
        $general->cita_id = $this->cita->id;
        $general->save();
        
        $cita = Cita::find($this->cita->id);
        $cita->estado = 'Terminada';
        $cita->color = '#5cb85c';
        $cita->save();
        
        session()->flash('datos', 'Se envió correctamente');
        return redirect()->route('doctor.calendar.index'); 
    }

    public function render()
    {
        return view('livewire.medica-general')
        ->extends('plantilla.plantilla')
        ->section('contenido');
    }
}

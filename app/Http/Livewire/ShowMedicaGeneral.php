<?php

namespace App\Http\Livewire;

use App\Models\General;
use Livewire\Component;

class ShowMedicaGeneral extends Component
{
    public $cita_id;
    public $motivo, $alergicos, $quirurgicos, $otros;
    public $fiebre, $tos, $cansancio, $dolor_garganta, $dolor_cabeza, $perdida, $dificultad, $sintoma_otro;
    public $aspecto_general, $peso, $talla, $tension_arterial, $frecuencia_cardiaca, $frecuencia_respiratoria, $masa_corporal, $temperatura;
    public $cabeza_cuello, $ojos, $cardiaco, $pulmonar, $abdomen, $mental;
    public $diagnostico_principal, $analisis_plan;

    public function mount()
    {
        $general = General::where('cita_id', $this->cita_id)->first();
        $this->motivo = $general->motivo;
        $this->alergicos = $general->alergicos;
        $this->quirurgicos = $general->quirurgicos;
        $this->otros = $general->otros;
        $this->fiebre = $general->fiebre;
        $this->tos = $general->tos;
        $this->cansancio = $general->cansancio;
        $this->dolor_garganta = $general->dolor_garganta;
        $this->dolor_cabeza = $general->dolor_cabeza;
        $this->perdida = $general->perdida;
        $this->dificultad = $general->dificultad;
        $this->sintoma_otro = $general->sintoma_otro;
        $this->aspecto_general = $general->aspecto_general;
        $this->peso = $general->peso;
        $this->talla = $general->talla;
        $this->tension_arterial = $general->tension_arterial;
        $this->frecuencia_cardiaca = $general->frecuencia_cardiaca;
        $this->frecuencia_respiratoria = $general->frecuencia_respiratoria;
        $this->masa_corporal = $general->masa_corporal;
        $this->temperatura = $general->temperatura;
        $this->cabeza_cuello = $general->cabeza_cuello;
        $this->ojos = $general->ojos;
        $this->cardiaco = $general->cardiaco;
        $this->pulmonar = $general->pulmonar;
        $this->abdomen = $general->abdomen;
        $this->mental = $general->mental;
        $this->diagnostico_principal = $general->diagnostico_principal;
        $this->analisis_plan = $general->analisis_plan;
    }

    public function render()
    {
        return view('livewire.show-medica-general');
    }
}

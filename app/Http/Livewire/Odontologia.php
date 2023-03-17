<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Odontologia as ModelsOdontologia;
use Carbon\Carbon;
use Livewire\Component;

class Odontologia extends Component
{
    public $position_tooth = 18;
    public $cita, $edad;
    public $tooth, $motivo, $alergicos, $quirurgicos, $otros, $labios, $carrillos;
    public $lengua, $glandulas_salivares, $paladar, $maxilares, $piso_boca, $sistema_glangionar;
    public $diagnostico_principal, $observaciones;

    public $diente_11, $diente_12, $diente_13, $diente_14, $diente_15, $diente_16, $diente_17, $diente_18;
    public $diente_21, $diente_22, $diente_23, $diente_24, $diente_25, $diente_26, $diente_27, $diente_28;
    public $diente_31, $diente_32, $diente_33, $diente_34, $diente_35, $diente_36, $diente_37, $diente_38;
    public $diente_41, $diente_42, $diente_43, $diente_44, $diente_45, $diente_46, $diente_47, $diente_48;

    public $diente_51, $diente_52, $diente_53, $diente_54, $diente_55;
    public $diente_61, $diente_62, $diente_63, $diente_64, $diente_65;
    public $diente_71, $diente_72, $diente_73, $diente_74, $diente_75;
    public $diente_81, $diente_82, $diente_83, $diente_84, $diente_85;

    public function mount($id)
    {
        $this->cita = Cita::find($id);
        $this->edad = Carbon::parse($this->cita->paciente->fecha_nacimiento)->age;

        if ($this->edad > 7) {
            $this->position_tooth = 18;
        } else {
            $this->position_tooth = 55;
        }
    }

    public function newData()
    {
        $this->validate([
            'motivo' => 'required',
            'diagnostico_principal' => 'required',
            'observaciones' => 'required'
        ]);

        $odonto = new ModelsOdontologia();
        $odonto->motivo = $this->motivo;
        $odonto->alergicos = $this->alergicos;
        $odonto->quirurgicos = $this->quirurgicos;
        $odonto->otros = $this->otros;
        $odonto->labios = $this->labios;
        $odonto->carrillos = $this->carrillos;
        $odonto->lengua = $this->lengua;
        $odonto->glandulas_salivares = $this->glandulas_salivares;
        $odonto->paladar = $this->paladar;
        $odonto->maxilares = $this->maxilares;
        $odonto->piso_boca = $this->piso_boca;
        $odonto->sistema_glangionar = $this->sistema_glangionar;
        $odonto->diagnostico_principal = $this->diagnostico_principal;
        $odonto->observaciones = $this->observaciones;

        $odonto->diente_11 = !empty($this->tooth[11]) ? $this->tooth[11] : NULL;
        $odonto->diente_12 = !empty($this->tooth[12]) ? $this->tooth[12] : NULL;
        $odonto->diente_13 = !empty($this->tooth[13]) ? $this->tooth[13] : NULL;
        $odonto->diente_14 = !empty($this->tooth[14]) ? $this->tooth[14] : NULL;
        $odonto->diente_15 = !empty($this->tooth[15]) ? $this->tooth[15] : NULL;
        $odonto->diente_16 = !empty($this->tooth[16]) ? $this->tooth[16] : NULL;
        $odonto->diente_17 = !empty($this->tooth[17]) ? $this->tooth[17] : NULL;
        $odonto->diente_18 = !empty($this->tooth[18]) ? $this->tooth[18] : NULL;

        $odonto->diente_21 = !empty($this->tooth[21]) ? $this->tooth[21] : NULL;
        $odonto->diente_22 = !empty($this->tooth[22]) ? $this->tooth[22] : NULL;
        $odonto->diente_23 = !empty($this->tooth[23]) ? $this->tooth[23] : NULL;
        $odonto->diente_24 = !empty($this->tooth[24]) ? $this->tooth[24] : NULL;
        $odonto->diente_25 = !empty($this->tooth[25]) ? $this->tooth[25] : NULL;
        $odonto->diente_26 = !empty($this->tooth[26]) ? $this->tooth[26] : NULL;
        $odonto->diente_27 = !empty($this->tooth[27]) ? $this->tooth[27] : NULL;
        $odonto->diente_28 = !empty($this->tooth[28]) ? $this->tooth[28] : NULL;

        $odonto->diente_31 = !empty($this->tooth[31]) ? $this->tooth[31] : NULL;
        $odonto->diente_32 = !empty($this->tooth[32]) ? $this->tooth[32] : NULL;
        $odonto->diente_33 = !empty($this->tooth[33]) ? $this->tooth[33] : NULL;
        $odonto->diente_34 = !empty($this->tooth[34]) ? $this->tooth[34] : NULL;
        $odonto->diente_35 = !empty($this->tooth[35]) ? $this->tooth[35] : NULL;
        $odonto->diente_36 = !empty($this->tooth[36]) ? $this->tooth[36] : NULL;
        $odonto->diente_37 = !empty($this->tooth[37]) ? $this->tooth[37] : NULL;
        $odonto->diente_38 = !empty($this->tooth[38]) ? $this->tooth[38] : NULL;

        $odonto->diente_41 = !empty($this->tooth[41]) ? $this->tooth[41] : NULL;
        $odonto->diente_42 = !empty($this->tooth[42]) ? $this->tooth[42] : NULL;
        $odonto->diente_43 = !empty($this->tooth[43]) ? $this->tooth[43] : NULL;
        $odonto->diente_44 = !empty($this->tooth[44]) ? $this->tooth[44] : NULL;
        $odonto->diente_45 = !empty($this->tooth[45]) ? $this->tooth[45] : NULL;
        $odonto->diente_46 = !empty($this->tooth[46]) ? $this->tooth[46] : NULL;
        $odonto->diente_47 = !empty($this->tooth[47]) ? $this->tooth[47] : NULL;
        $odonto->diente_48 = !empty($this->tooth[48]) ? $this->tooth[48] : NULL;

        $odonto->diente_51 = !empty($this->tooth[51]) ? $this->tooth[51] : NULL;
        $odonto->diente_52 = !empty($this->tooth[52]) ? $this->tooth[52] : NULL;
        $odonto->diente_53 = !empty($this->tooth[53]) ? $this->tooth[53] : NULL;
        $odonto->diente_54 = !empty($this->tooth[54]) ? $this->tooth[54] : NULL;
        $odonto->diente_55 = !empty($this->tooth[55]) ? $this->tooth[55] : NULL;

        $odonto->diente_61 = !empty($this->tooth[61]) ? $this->tooth[61] : NULL;
        $odonto->diente_62 = !empty($this->tooth[62]) ? $this->tooth[62] : NULL;
        $odonto->diente_63 = !empty($this->tooth[63]) ? $this->tooth[63] : NULL;
        $odonto->diente_64 = !empty($this->tooth[64]) ? $this->tooth[64] : NULL;
        $odonto->diente_65 = !empty($this->tooth[65]) ? $this->tooth[65] : NULL;

        $odonto->diente_71 = !empty($this->tooth[71]) ? $this->tooth[71] : NULL;
        $odonto->diente_72 = !empty($this->tooth[72]) ? $this->tooth[72] : NULL;
        $odonto->diente_73 = !empty($this->tooth[73]) ? $this->tooth[73] : NULL;
        $odonto->diente_74 = !empty($this->tooth[74]) ? $this->tooth[74] : NULL;
        $odonto->diente_75 = !empty($this->tooth[75]) ? $this->tooth[75] : NULL;

        $odonto->diente_81 = !empty($this->tooth[81]) ? $this->tooth[81] : NULL;
        $odonto->diente_82 = !empty($this->tooth[82]) ? $this->tooth[82] : NULL;
        $odonto->diente_83 = !empty($this->tooth[83]) ? $this->tooth[83] : NULL;
        $odonto->diente_84 = !empty($this->tooth[84]) ? $this->tooth[84] : NULL;
        $odonto->diente_85 = !empty($this->tooth[85]) ? $this->tooth[85] : NULL;

        $odonto->edad = $this->edad;
        $odonto->cita_id = $this->cita->id;

        $odonto->save();

        $cita = Cita::find($this->cita->id);
        $cita->estado = 'Terminada';
        $cita->color = '#5cb85c';
        $cita->save();
        
        session()->flash('datos', 'Se envió correctamente');
        return redirect()->route('doctor.calendar.index'); 
    }

    public function render()
    {
        return view('livewire.odontologia')
        ->extends('plantilla.plantilla')
        ->section('contenido');
    }
}

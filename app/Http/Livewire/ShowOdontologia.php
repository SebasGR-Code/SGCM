<?php

namespace App\Http\Livewire;

use App\Models\Odontologia;
use Livewire\Component;

class ShowOdontologia extends Component
{
    public $position_tooth = 18;
    public $cita_id, $edad;
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

    public function mount()
    {
        $odonto = Odontologia::where('cita_id', $this->cita_id)->first();
        $this->motivo = $odonto->motivo;
        $this->alergicos = $odonto->alergicos;
        $this->quirurgicos = $odonto->quirurgicos;
        $this->otros = $odonto->otros;
        $this->labios = $odonto->labios;
        $this->carrillos = $odonto->carrillos;
        $this->lengua = $odonto->lengua;
        $this->glandulas_salivares = $odonto->glandulas_salivares;
        $this->paladar = $odonto->paladar;
        $this->maxilares = $odonto->maxilares;
        $this->piso_boca = $odonto->piso_boca;
        $this->sistema_glangionar = $odonto->sistema_glangionar;
        $this->diagnostico_principal = $odonto->diagnostico_principal;
        $this->observaciones = $odonto->observaciones;

        $this->tooth[11] = $odonto->diente_11;
        $this->tooth[12] = $odonto->diente_12;
        $this->tooth[13] = $odonto->diente_13;
        $this->tooth[14] = $odonto->diente_14;
        $this->tooth[15] = $odonto->diente_15;
        $this->tooth[16] = $odonto->diente_16;
        $this->tooth[17] = $odonto->diente_17;
        $this->tooth[18] = $odonto->diente_18;

        $this->tooth[21] = $odonto->diente_21;
        $this->tooth[22] = $odonto->diente_22;
        $this->tooth[23] = $odonto->diente_23;
        $this->tooth[24] = $odonto->diente_24;
        $this->tooth[25] = $odonto->diente_25;
        $this->tooth[26] = $odonto->diente_26;
        $this->tooth[27] = $odonto->diente_27;
        $this->tooth[28] = $odonto->diente_28;

        $this->tooth[31] = $odonto->diente_31;
        $this->tooth[32] = $odonto->diente_32;
        $this->tooth[33] = $odonto->diente_33;
        $this->tooth[34] = $odonto->diente_34;
        $this->tooth[35] = $odonto->diente_35;
        $this->tooth[36] = $odonto->diente_36;
        $this->tooth[37] = $odonto->diente_37;
        $this->tooth[38] = $odonto->diente_38;

        $this->tooth[41] = $odonto->diente_41;
        $this->tooth[42] = $odonto->diente_42;
        $this->tooth[43] = $odonto->diente_43;
        $this->tooth[44] = $odonto->diente_44;
        $this->tooth[45] = $odonto->diente_45;
        $this->tooth[46] = $odonto->diente_46;
        $this->tooth[47] = $odonto->diente_47;
        $this->tooth[48] = $odonto->diente_48;

        $this->tooth[51] = $odonto->diente_51;
        $this->tooth[52] = $odonto->diente_52;
        $this->tooth[53] = $odonto->diente_53;
        $this->tooth[54] = $odonto->diente_54;
        $this->tooth[55] = $odonto->diente_55;

        $this->tooth[61] = $odonto->diente_61;
        $this->tooth[62] = $odonto->diente_62;
        $this->tooth[63] = $odonto->diente_63;
        $this->tooth[64] = $odonto->diente_64;
        $this->tooth[65] = $odonto->diente_65;

        $this->tooth[71] = $odonto->diente_71;
        $this->tooth[72] = $odonto->diente_72;
        $this->tooth[73] = $odonto->diente_73;
        $this->tooth[74] = $odonto->diente_74;
        $this->tooth[75] = $odonto->diente_75;

        $this->tooth[81] = $odonto->diente_81;
        $this->tooth[82] = $odonto->diente_82;
        $this->tooth[83] = $odonto->diente_83;
        $this->tooth[84] = $odonto->diente_84;
        $this->tooth[85] = $odonto->diente_85;

        $this->edad = $odonto->edad;
        if ($this->edad > 7) {
            $this->position_tooth = 18;
        } else {
            $this->position_tooth = 55;
        }
    }

    public function render()
    {
        return view('livewire.show-odontologia');
    }
}

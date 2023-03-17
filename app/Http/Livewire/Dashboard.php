<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Sala;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $fecha_inicio, $fecha_fin;
    public $old_count_doctor, $old_count_citas;
    public $cant_admin, $cant_afiliados, $cant_doctor, $cant_salas, $cant_citas, $cant_citas_cancel, $cant_citas_noassist;
    public $cant_infancia = 0, $cant_adolescencia = 0, $cant_juventud = 0, $cant_adultez = 0, $cant_mayor = 0;
    public $values_edad = [];
    public $values_tipo = [];
    public $values_sintomas = [];
    public $values_doctores = [];
    public $values_citas = [];

    public function mount()
    {
        $this->fecha_inicio = '2022-01-01';
        $this->fecha_fin = date('Y-m-d');

        $this->cant_admin = Admin::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_afiliados = Paciente::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_doctor = Doctor::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_salas = Sala::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_citas = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->count();
        $this->cant_citas_cancel = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Cancelada')->count();
        $this->cant_citas_noassist = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Sin Asistencia')->count();

	$this->values_doctores["nombres"] = [];
	$this->values_citas["fechas"] = [];
    }

    public function search()
    {
        $this->cant_admin = Admin::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_afiliados = Paciente::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_doctor = Doctor::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_salas = Sala::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->count();
        $this->cant_citas = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->count();
        $this->cant_citas_cancel = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Cancelada')->count();
        $this->cant_citas_noassist = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Sin Asistencia')->count();

        $citas = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->get();
        $this->cant_infancia = 0;
        $this->cant_adolescencia = 0;
        $this->cant_juventud = 0;
        $this->cant_adultez = 0;
        $this->cant_mayor = 0;
        foreach ($citas as $cita) {
            $edad = Carbon::parse($cita->paciente->fecha_nacimiento)->age;
            if ($edad >= 6 && $edad <= 11) {
                $this->cant_infancia = $this->cant_infancia + 1;
            } elseif ($edad >= 12 && $edad <= 18) {
                $this->cant_adolescencia = $this->cant_adolescencia + 1;
            } elseif ($edad >= 19 && $edad <= 26) {
                $this->cant_juventud = $this->cant_juventud + 1;
            } elseif ($edad >= 27 && $edad <= 59) {
                $this->cant_adultez = $this->cant_adultez + 1;
            } elseif ($edad >= 60) {
                $this->cant_mayor = $this->cant_mayor + 1;
            }
        }

        $this->values_edad = [$this->cant_infancia, $this->cant_adolescencia, $this->cant_juventud, $this->cant_adultez, $this->cant_mayor];
        $this->emit('removeDataEdad');

        $cant_general = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('title', 'Medicina General')->where('estado', 'Terminada')->count();
        $cant_odontologia = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('title', 'Odontologia')->where('estado', 'Terminada')->count();
        $this->values_tipo = [$cant_general, $cant_odontologia];
        $this->emit('removeDataTipo');

        $cant_fiebre = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('fiebre', '1');
                            })->count();

        $cant_tos = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('tos', '1');
                            })->count();
        
        $cant_cansancio = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('cansancio', '1');
                            })->count();
        $cant_dolor_garganta = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('dolor_garganta', '1');
                            })->count();
        $cant_dolor_cabeza = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('dolor_cabeza', '1');
                            })->count();
        $cant_perdida = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('perdida', '1');
                            })->count();
        $cant_dificultad = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->where('title', 'Medicina General')
                            ->whereHas('general', function ($query){
                                $query->where('dificultad', '1');
                            })->count();
        $this->values_sintomas = [$cant_fiebre, $cant_tos, $cant_cansancio, $cant_dolor_garganta, $cant_dolor_cabeza, $cant_perdida, $cant_dificultad];
        $this->emit('removeDataSintomas');

        $doctores = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->groupBy('doctor_id')->select('doctor_id', DB::raw('count(*) as total'))->get();
	
        $this->old_count_doctor = count($this->values_doctores["nombres"]);
        $this->values_doctores["nombres"] = [];
        $this->values_doctores["total"] = [];
        foreach ($doctores as $doctor) {
            $doc = Doctor::find($doctor->doctor_id);
            array_push($this->values_doctores["nombres"], $doc->nombre." ".$doc->apellidos);
            array_push($this->values_doctores["total"], $doctor->total); 
        }
        $this->emit('removeDataDoctores');
	
	$this->old_count_citas = count($this->values_citas["fechas"]);
        $this->values_citas["fechas"] = [];
        $this->values_citas["cantidad"] = [];
        $dates = Cita::whereBetween('start', [$this->fecha_inicio, $this->fecha_fin])->where('estado', 'Terminada')->selectRaw("COUNT(*) total, DATE_FORMAT(start, '%Y-%m-%d') date")
        ->groupBy('date')
        ->get();

        foreach ($dates as $date) {
            array_push($this->values_citas["fechas"], $date->date);
            array_push($this->values_citas["cantidad"], $date->total);
        }
        $this->emit('removeDataCitas');
    }

    public function render()
    {
        return view('livewire.dashboard')
        ->extends('plantilla.plantilla')
        ->section('contenido');
    }
}
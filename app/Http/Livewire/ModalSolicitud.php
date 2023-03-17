<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalSolicitud extends Component
{
    public $solicitud;
    public $especialidad, $doctores = [], $doctor_id, $paciente_id;
    public $pacientes, $start, $end;

    public function mount()
    {
        $this->pacientes = Paciente::get();
        $this->especialidad = $this->solicitud->tipo_cita;
        $this->doctor_id = $this->solicitud->doctor_id;
        $this->paciente_id = $this->solicitud->paciente_id;
        $this->updatedEspecialidad($this->solicitud->tipo_cita);
    }

    public function updatedEspecialidad($value)
    {
        $this->doctores = Doctor::where('especialidad', $value)->get() ?? [];
    }

    public function newData()
    {
        $this->validate([
            'start' => 'required',
            'end' => 'required',
            'doctor_id' => 'required',
            'paciente_id' => 'required',
        ]);

        if ($this->start < $this->end) {
            $consulta = Cita::where('end', '>=', $this->start)->where('start', '<=', $this->end)->where('doctor_id', $this->doctor_id)->get();
            if ($consulta->isEmpty()) {
                $cita = new Cita();
                $doctor = Doctor::find($this->doctor_id);
        
                $cita->title = $doctor->especialidad;
                $cita->start = Carbon::parse($this->start)->format('Y-m-d H:i');
                $cita->end = Carbon::parse($this->end)->format('Y-m-d H:i');
                $cita->doctor_id = $this->doctor_id;
                $cita->estado = 'En espera';
                $cita->color = '#007bff';
                $cita->paciente_id = $this->paciente_id;
                $cita->solicitud_id = $this->solicitud->id;
                $cita->admin_id = Auth::user()->admin->id;
        
                $cita->save();
        
                $solicitud = Solicitud::find($this->solicitud->id);
        
                $solicitud->estado = 'Aprobada';
                $solicitud->save();
        
                return redirect()->route('admin.solicitud.index')->with('datos','Cita creada correctamente!');
            } else {
                $this->emit('swal', 'info', 'No hay disponibilidad para este horario');
            }
        } else {
            $this->emit('swal', 'error', 'Incoherencia en la fecha de inicio y fin');
        }
    }

    public function render()
    {
        return view('livewire.modal-solicitud');
    }
}

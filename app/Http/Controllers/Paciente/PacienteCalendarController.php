<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Nucleo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteCalendarController extends Controller
{
    public function index()
    {
        return view('paciente.calendar.index');
    }

    //Obtener todas del paciente
    public function show()
    {
        $nucleo = Nucleo::where('user_id', Auth::user()->id)->pluck('paciente_id');
        $nucleo->push(Auth::user()->paciente->id);
        $citas = Cita::whereIn('paciente_id', $nucleo)->get();
        return response()->json($citas);
    }

    //Tomar cita
    public function takeCita($id)
    {
        $cita = Cita::find($id);
        $fecha = Carbon::parse($cita->start)->format('Y-m-d');
        $hora = Carbon::parse($cita->start)->format('g:i A');
        $datos = array(
            'id' => $cita->id,
            'title' => $cita->title,
            'fecha' => $fecha,
            'hora' => $hora,
            'estado' => $cita->estado,
            'doctor' => $cita->doctor->nombre." ".$cita->doctor->apellidos,
            'paciente' => $cita->paciente->nombre." ".$cita->paciente->apellidos,
            'sala' => $cita->doctor->sala->nombre,
        );
        return response()->json($datos);
    }

    public function cancelCita($id)
    {
        $cita = Cita::find($id);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:i:s"));
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $cita->start);
        $diff_in_days = $to->diffInDays($from);

        //$diff_in_days > 0 Esta en el if
        if (true) {
            $cita->estado = 'Cancelada';
            $cita->color = '#f0ad4e';
            $cita->save();

            return response()->json($cita);
        }else{
            return response()->json($cita);
        }
        
    }
}

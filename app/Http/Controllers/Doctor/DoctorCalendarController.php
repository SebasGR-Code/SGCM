<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Mail\PenaltyMessage;
use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DoctorCalendarController extends Controller
{
    public function index()
    {
        return view('doctor.calendar.index');
    }

    //Obtener todas del paciente
    public function show()
    {
        $citas = Cita::where('doctor_id', Auth::user()->doctor->id)->get();
        return response()->json($citas);
    }

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
            'paciente' => $cita->paciente->nombre." ".$cita->paciente->apellidos,
            'sala' => $cita->doctor->sala->nombre,
        );
        return response()->json($datos);
    }

    public function finishCita($id)
    {
        $cita = Cita::find($id);
        $cita->estado = 'Terminada';
        $cita->color = '#5cb85c';
        $cita->save();
        return response()->json($cita);
    }

    public function noAssist($id)
    {
        $cita = Cita::find($id);
        $cita->estado = 'Sin Asistencia';
        $cita->color = '#d9534f';
        $cita->save();

        $fecha = Carbon::parse($cita->start)->format('Y-m-d');
        $hora = Carbon::parse($cita->start)->format('g:i A');
        Mail::to('s.garcia22@ciaf.edu.co')->queue(new PenaltyMessage($fecha, $hora));

        return response()->json($cita);
    }
}

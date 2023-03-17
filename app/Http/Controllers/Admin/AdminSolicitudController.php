<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CitaMessage;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminSolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::get();
        return view('admin.solicitud.index', compact('solicitudes'));
    }

    public function storeCita(Request $request)
    {
        $request->validate(Cita::$rules);

        if ($request->start < $request->end) {
            $consulta = Cita::where('end', '>=', $request->start)->where('start', '<=', $request->end)->where('doctor_id', $request->doctor_id)->get();
            if ($consulta->isEmpty()) {
                $cita = new Cita();
                $doctor = Doctor::find($request->doctor_id);
        
                $cita->title = $doctor->especialidad;
                $cita->start = Carbon::parse($request->start)->format('Y-m-d H:i');
                $cita->end = Carbon::parse($request->end)->format('Y-m-d H:i');
                $cita->doctor_id = $request->doctor_id;
                $cita->estado = 'En espera';
                $cita->color = '#007bff';
                $cita->paciente_id = $request->paciente_id;
                $cita->solicitud_id = $request->solicitud_id;
                $cita->admin_id = Auth::user()->admin->id;
        
                $cita->save();

                $fecha = Carbon::parse($cita->start)->format('Y-m-d');
                $hora = Carbon::parse($cita->start)->format('g:i A');
                Mail::to('s.garcia22@ciaf.edu.co')->queue(new CitaMessage($cita->title, $fecha, $hora, $cita->doctor->nombre, $cita->doctor->sala->nombre));
        
                $solicitud = Solicitud::find($request->solicitud_id);
        
                $solicitud->estado = 'Aprobada';
                $solicitud->save();
        
                return redirect()->route('admin.solicitud.index')->with('datos','Cita creada correctamente!');
            } else {
                return redirect()->route('admin.solicitud.index')->with('fallo','No hay disponibilidad en este horario');
            }
        }
    }

    public function noAcceptCita($id)
    {
        $solicitud = Solicitud::find($id);

        $solicitud->estado = 'Rechazada';
        $solicitud->save();

        return redirect()->route('admin.solicitud.index')->with('datos','La solicitud fue rechazada');
    }
}

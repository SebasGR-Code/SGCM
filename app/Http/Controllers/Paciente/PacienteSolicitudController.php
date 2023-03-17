<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Nucleo;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteSolicitudController extends Controller
{
    public function index()
    {
        $nucleo = Nucleo::where('user_id', Auth::user()->id)->pluck('paciente_id');
        $nucleo->push(Auth::user()->paciente->id);
        $solicitudes = Solicitud::whereIn('paciente_id', $nucleo)->get();

        $pacientes = Nucleo::where('user_id', Auth::user()->id)->get();
        return view('paciente.solicitud.index', compact('solicitudes', 'pacientes'));
    }

    public function store(Request $request)
    {
        $check = Solicitud::where(['paciente_id' => Auth::user()->paciente->id, 'tipo_cita' => $request->tipo_cita])
            ->whereDate('created_at', '=', date('Y-m-d'))->count();

        if ($check > 0) {
            return redirect()->route('paciente.solicitud.index')->with('cancelar','Solo puedes enviar una solicitud por cada tipo de cita en el dia');
        }

        $solicitud = new Solicitud();
        
        $solicitud -> disponibilidad = $request->disponibilidad;
        $solicitud -> tipo_cita = $request->tipo_cita;
        $solicitud -> doctor_id = $request->doctor_id;
        $solicitud -> paciente_id = $request->paciente_id;
        $solicitud -> estado = 'En espera';

        $solicitud->save();

        return redirect()->route('paciente.solicitud.index')->with('datos','Solicitud enviada correctamente!');
    }

    public function cancelSolicitud($id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud -> estado = 'Cancelada por el cliente';
        $solicitud->save();
        return redirect()->route('paciente.solicitud.index')->with('datos','Solicitud cancelada correctamente!');
    }


}

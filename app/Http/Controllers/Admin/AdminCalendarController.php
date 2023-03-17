<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CitaMessage;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminCalendarController extends Controller
{
    //Mostrar calendario de citas
    public function index()
    {
        $pacientes = Paciente::get();
        return view('admin.calendar.index',compact('pacientes'));
    }

    //Crear cita nueva
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Cita::$rules);

        if ($validator->fails()) {
            return 'Validacion incorrecta';
        }

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
                $cita->admin_id = Auth::user()->admin->id;
    
                $cita->save();
    
                $fecha = Carbon::parse($cita->start)->format('Y-m-d');
                $hora = Carbon::parse($cita->start)->format('g:i A');
                Mail::to('s.garcia22@ciaf.edu.co')->queue(new CitaMessage($cita->title, $fecha, $hora, $cita->doctor->nombre, $cita->doctor->sala->nombre));
            } else {
                return 'No disponible';
            }
        } else {
            return 'Incoherencia';
        }

        
    }

    //Obtener todas las citas
    public function show()
    {
        $citas = Cita::get();
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

        if ($diff_in_days > 0) {
            $cita->estado = 'Cancelada';
            $cita->color = '#f0ad4e';
            $cita->save();

            return response()->json($cita);
        }else{
            return response()->json($cita);
        }
        
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        return response()->json($cita);
    }
}

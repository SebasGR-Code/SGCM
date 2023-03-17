<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMessage;
use App\Models\Doctor;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminDoctorController extends Controller
{
    //Mostrar index con todos los doctores
    public function index()
    {
        $doctores = Doctor::get();
        return view('admin.doctor.index',compact('doctores'));
    }

    //Mostrar formulario para crear
    public function create()
    {
        $salas = Sala::get();
        return view('admin.doctor.create', compact('salas'));
    }

    //Guardar nuevo doctor
    public function store(Request $request)
    {
        $msg = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'especialidad' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $user = new User();
        
        $user -> email = $request->email;
        $user -> password = Hash::make($request->num_identificacion);
        $user -> rol = 'Doctor';

        $user->save();

        $doctor = new Doctor();

        $doctor -> nombre = $request->nombre;
        $doctor -> apellidos = $request->apellidos;
        $doctor -> tipo_identificacion = $request->tipo_identificacion;
        $doctor -> num_identificacion = $request->num_identificacion;
        $doctor -> rh = $request->rh;
        $doctor -> especialidad = $request->especialidad;
        $doctor -> genero = $request->genero;
        $doctor -> fecha_nacimiento = $request->fecha_nacimiento;
        $doctor -> sala_id = $request->sala_id;
        $doctor -> user_id = $user->id;

        $doctor->save();

        // Mail::to('s.garcia22@ciaf.edu.co')->queue(new RegisterMessage($msg));

        return redirect()->route('admin.doctor.create')->with('datos','Doctor creado correctamente!');
    }


    public function show($id)
    {
        //
    }

    //Mostrar formulario para editar
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $salas = Sala::get();
        return view('admin.doctor.edit',compact('doctor','salas'));
    }

    //Actualizar doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,'.$doctor->user_id,
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'especialidad' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'sala_id' => 'required',
        ]);

        $doctor -> nombre = $request->nombre;
        $doctor -> apellidos = $request->apellidos;
        $doctor -> tipo_identificacion = $request->tipo_identificacion;
        $doctor -> num_identificacion = $request->num_identificacion;
        $doctor -> rh = $request->rh;
        $doctor -> especialidad = $request->especialidad;
        $doctor -> genero = $request->genero;
        $doctor -> fecha_nacimiento = $request->fecha_nacimiento;
        $doctor -> sala_id = $request->sala_id;

        $doctor->save();

        $user = User::find($doctor->user_id);
        
        $user -> email = $request->email;

        $user->save();

        return redirect()->route('admin.doctor.edit',$doctor->id)->with('datos','Doctor actualizado correctamente!');
    }

    //Eliminar doctor
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $user = User::find($doctor->user_id);
        $user->estado = 1;
        $user->save();

        return redirect()->route('admin.doctor.index')->with('eliminar','ok');
    }

    public function activate($id)
    {
        $doctor = Doctor::find($id);

        $user = User::find($doctor->user_id);
        $user -> estado = 0;
        $user->save();

        return redirect()->route('admin.doctor.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMessage;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAdministradorController extends Controller
{
    //Mostrar index con todos los doctores
    public function index()
    {
        $administradores = Admin::get();
        return view('admin.administrador.index',compact('administradores'));
    }

    //Mostrar formulario para crear
    public function create()
    {
        return view('admin.administrador.create');
    }

    //Guardar nuevo doctor
    public function store(Request $request)
    {
        $msg = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $user = new User();
        
        $user -> email = $request->email;
        $user -> password = Hash::make($request->num_identificacion);
        $user -> rol = 'Admin';

        $user->save();

        $admin = new Admin();

        $admin -> nombre = $request->nombre;
        $admin -> apellidos = $request->apellidos;
        $admin -> tipo_identificacion = $request->tipo_identificacion;
        $admin -> num_identificacion = $request->num_identificacion;
        $admin -> rh = $request->rh;
        $admin -> genero = $request->genero;
        $admin -> fecha_nacimiento = $request->fecha_nacimiento;
        $admin -> user_id = $user->id;

        $admin->save();

        Mail::to('s.garcia22@ciaf.edu.co')->queue(new RegisterMessage($msg));

        return redirect()->route('admin.administrador.create')->with('datos','Administrador creado correctamente!');
    }


    public function show($id)
    {
        //
    }

    //Mostrar formulario para editar
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.administrador.edit',compact('admin'));
    }

    //Actualizar doctor
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->user_id,
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $admin -> nombre = $request->nombre;
        $admin -> apellidos = $request->apellidos;
        $admin -> tipo_identificacion = $request->tipo_identificacion;
        $admin -> num_identificacion = $request->num_identificacion;
        $admin -> rh = $request->rh;
        $admin -> genero = $request->genero;
        $admin -> fecha_nacimiento = $request->fecha_nacimiento;

        $admin->save();

        $user = User::find($admin->user_id);
        
        $user -> email = $request->email;

        $user->save();

        return redirect()->route('admin.administrador.edit',$admin->id)->with('datos','Administrador actualizado correctamente!');
    }

    //Eliminar doctor
    public function destroy($id)
    {
        $admin = Admin::find($id);

        $user = User::find($admin->user_id);
        $user->estado = 1;
        $user->save();

        return redirect()->route('admin.administrador.index')->with('eliminar','ok');
    }

    public function activate($id)
    {
        $admin = Admin::find($id);

        $user = User::find($admin->user_id);
        $user -> estado = 0;
        $user->save();

        return redirect()->route('admin.administrador.index');
    }
}

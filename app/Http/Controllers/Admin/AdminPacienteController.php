<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMessage;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::where('user_id', '!=', null)->get();
        return view('admin.paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $user -> rol = 'Paciente';

        $user->save();

        $paciente = new Paciente();

        $paciente -> nombre = $request->nombre;
        $paciente -> apellidos = $request->apellidos;
        $paciente -> tipo_identificacion = $request->tipo_identificacion;
        $paciente -> num_identificacion = $request->num_identificacion;
        $paciente -> rh = $request->rh;
        $paciente -> genero = $request->genero;
        $paciente -> fecha_nacimiento = $request->fecha_nacimiento;
        $paciente -> user_id = $user->id;

        $paciente->save();

        Mail::to('s.garcia22@ciaf.edu.co')->queue(new RegisterMessage($msg));

        return redirect()->route('admin.paciente.create')->with('datos','Afiliado creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('admin.paciente.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,'.$paciente->user_id,
            'apellidos' => 'required',
            'tipo_identificacion' => 'required',
            'num_identificacion' => 'required',
            'rh' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $paciente -> nombre = $request->nombre;
        $paciente -> apellidos = $request->apellidos;
        $paciente -> tipo_identificacion = $request->tipo_identificacion;
        $paciente -> num_identificacion = $request->num_identificacion;
        $paciente -> rh = $request->rh;
        $paciente -> genero = $request->genero;
        $paciente -> fecha_nacimiento = $request->fecha_nacimiento;

        $paciente->save();

        $user = User::find($paciente->user_id);
        
        $user -> email = $request->email;

        $user->save();

        return redirect()->route('admin.paciente.edit',$paciente->id)->with('datos','Afiliado actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        $user = User::find($paciente->user_id);
        $user->estado = 1;
        $user->save();

        return redirect()->route('admin.paciente.index')->with('eliminar','ok');
    }

    public function activate($id)
    {
        $paciente = Paciente::find($id);

        $user = User::find($paciente->user_id);
        $user -> estado = 0;
        $user->save();

        return redirect()->route('admin.paciente.index');
    }
}

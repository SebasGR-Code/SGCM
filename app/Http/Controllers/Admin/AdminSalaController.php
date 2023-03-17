<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use Illuminate\Http\Request;

class AdminSalaController extends Controller
{
    //Mostrar index con todos los doctores
    public function index()
    {
        $salas = Sala::get();
        return view('admin.sala.index',compact('salas'));
    }

    //Crear nueva sala
    public function store(Request $request)
    {
        $sala = new Sala();
        
        $sala -> nombre = $request->nombre;

        $sala->save();

        return redirect()->route('admin.sala.index')->with('datos','Sala creada correctamente!');
    }

    public function destroy($id)
    {
        $sala = Sala::find($id);
        
        $sala->delete();

        return redirect()->route('admin.sala.index')->with('eliminar','ok');
    }
}

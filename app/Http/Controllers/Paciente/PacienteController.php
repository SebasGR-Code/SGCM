<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solopaciente',['only' => 'index']);
    }

    public function index()
    {
        return redirect()->route('paciente.calendar.index');
    }
}

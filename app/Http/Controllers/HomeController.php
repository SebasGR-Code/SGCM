<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('plantilla.plantilla');
    }

    public function getDoctores(Request $request)
    {
        $doctores = Doctor::where('especialidad',$request->especialidad)->get();
        $doctoresArray = [];
        foreach ($doctores as $doctor) {
            $doctoresArray[$doctor->id] = $doctor->nombre." ".$doctor->apellidos." - ".$doctor->tipo_identificacion.$doctor->num_identificacion;
        }
        return response()->json($doctoresArray);
    }
}

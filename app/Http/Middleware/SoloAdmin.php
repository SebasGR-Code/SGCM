<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->estado != 0) {
            return redirect('/finishSession');
        }
        switch(Auth::user()->rol){
            case('Doctor'):
                return redirect('doctor');
            break;
            case('Paciente'):
                return redirect('paciente');
            break;
            case('Admin'):
                return $next($request);
            break;   
        }  
    }
}

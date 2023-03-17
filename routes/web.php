<?php

use App\Http\Controllers\Admin\AdminAdministradorController;
use App\Http\Controllers\Admin\AdminCalendarController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminPacienteController;
use App\Http\Controllers\Admin\AdminSalaController;
use App\Http\Controllers\Admin\AdminSolicitudController;
use App\Http\Controllers\Doctor\DoctorCalendarController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Paciente\PacienteCalendarController;
use App\Http\Controllers\Paciente\PacienteController;
use App\Http\Controllers\Paciente\PacienteSolicitudController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\FamilyNucleus;
use App\Http\Livewire\Historial;
use App\Http\Livewire\MedicaGeneral;
use App\Http\Livewire\Odontologia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/prueba', function () {
//     // en el end se envia el parametro start y en start se manda el parametro end;
//     $consulta2 = App\Models\Cita::where('end', '>=', '2022-11-09 08:00:00')->where('start', '<=', '2022-11-10 08:30:00')->get();
//     dd($consulta2->isEmpty());
//     // return redirect('/login');
// });

// Route::get('/finishSession', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // });
    
Route::get('/', function () {
    return redirect('login');
});
Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente');
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    
    //Rutas de administracion de administradores
    Route::get('admin/administrador', [AdminAdministradorController::class, 'index'])->name('admin.administrador.index');
    Route::get('admin/administrador/create', [AdminAdministradorController::class, 'create'])->name('admin.administrador.create');
    Route::post('admin/administrador', [AdminAdministradorController::class, 'store'])->name('admin.administrador.store');
    Route::get('admin/administrador/edit/{id}', [AdminAdministradorController::class, 'edit'])->name('admin.administrador.edit');
    Route::put('admin/administrador/update/{id}', [AdminAdministradorController::class, 'update'])->name('admin.administrador.update');
    Route::delete('admin/administrador/destroy/{id}', [AdminAdministradorController::class, 'destroy'])->name('admin.administrador.destroy');
    Route::get('admin/administrador/activate/{id}', [AdminAdministradorController::class, 'activate'])->name('admin.administrador.activate');
    
    //Rutas de administracion de pacientes (afiliados)
    Route::get('admin/paciente', [AdminPacienteController::class, 'index'])->name('admin.paciente.index');
    Route::get('admin/paciente/create', [AdminPacienteController::class, 'create'])->name('admin.paciente.create');
    Route::post('admin/paciente', [AdminPacienteController::class, 'store'])->name('admin.paciente.store');
    Route::get('admin/paciente/edit/{id}', [AdminPacienteController::class, 'edit'])->name('admin.paciente.edit');
    Route::put('admin/paciente/update/{id}', [AdminPacienteController::class, 'update'])->name('admin.paciente.update');
    Route::delete('admin/paciente/destroy/{id}', [AdminPacienteController::class, 'destroy'])->name('admin.paciente.destroy');
    Route::get('admin/paciente/activate/{id}', [AdminPacienteController::class, 'activate'])->name('admin.paciente.activate');
    
    Route::get('/nucleo-familiar/{id}', FamilyNucleus::class)->name('admin.paciente.family-nucleus');
    
    //Rutas de administracion de doctores
    Route::get('admin/doctor', [AdminDoctorController::class, 'index'])->name('admin.doctor.index');
    Route::get('admin/doctor/create', [AdminDoctorController::class, 'create'])->name('admin.doctor.create');
    Route::post('admin/doctor', [AdminDoctorController::class, 'store'])->name('admin.doctor.store');
    Route::get('admin/doctor/edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctor.edit');
    Route::put('admin/doctor/update/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctor.update');
    Route::delete('admin/doctor/destroy/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctor.destroy');
    Route::get('admin/doctor/activate/{id}', [AdminDoctorController::class, 'activate'])->name('admin.doctor.activate');
    
    //Rutas de administracion de salas
    Route::get('admin/sala', [AdminSalaController::class, 'index'])->name('admin.sala.index');
    Route::post('admin/sala', [AdminSalaController::class, 'store'])->name('admin.sala.store');
    Route::delete('admin/sala/destroy/{id}', [AdminSalaController::class, 'destroy'])->name('admin.sala.destroy');
    
    Route::get('admin/calendar', [AdminCalendarController::class, 'index'])->name('admin.calendar.index');
    Route::post('admin/calendar/store', [AdminCalendarController::class, 'store'])->name('admin.calendar.store');
    Route::get('admin/calendar/show', [AdminCalendarController::class, 'show'])->name('admin.calendar.show');
    Route::get('admin/calendar/takeCita/{id}', [AdminCalendarController::class, 'takeCita'])->name('admin.calendar.takeCita');
    Route::post('admin/calendar/cancelCita/{id}', [AdminCalendarController::class, 'cancelCita'])->name('admin.calendar.cancelCita');
    Route::post('admin/calendar/destroy/{id}', [AdminCalendarController::class, 'destroy'])->name('admin.calendar.destroy');
    
    Route::get('admin/solicitud', [AdminSolicitudController::class, 'index'])->name('admin.solicitud.index');
    Route::post('admin/solicitud/storeCita', [AdminSolicitudController::class, 'storeCita'])->name('admin.solicitud.storeCita');
    Route::get('admin/solicitud/noAcceptCita/{id}', [AdminSolicitudController::class, 'noAcceptCita'])->name('admin.solicitud.noAcceptCita');
    
    Route::get('paciente/calendar', [PacienteCalendarController::class, 'index'])->name('paciente.calendar.index');
    Route::get('paciente/calendar/show', [PacienteCalendarController::class, 'show'])->name('paciente.calendar.show');
    Route::get('paciente/calendar/takeCita/{id}', [PacienteCalendarController::class, 'takeCita'])->name('paciente.calendar.takeCita');
    Route::post('paciente/calendar/cancelCita/{id}', [PacienteCalendarController::class, 'cancelCita'])->name('paciente.calendar.cancelCita');
    
    Route::get('paciente/solicitud', [PacienteSolicitudController::class, 'index'])->name('paciente.solicitud.index');
    Route::post('paciente/solicitud', [PacienteSolicitudController::class, 'store'])->name('paciente.solicitud.store');
    Route::get('paciente/solicitud/cancelSolicitud/{id}', [PacienteSolicitudController::class, 'cancelSolicitud'])->name('paciente.solicitud.cancelSolicitud');
    
    Route::get('doctor/calendar', [DoctorCalendarController::class, 'index'])->name('doctor.calendar.index');
    Route::get('doctor/calendar/show', [DoctorCalendarController::class, 'show'])->name('doctor.calendar.show');
    Route::get('doctor/calendar/takeCita/{id}', [DoctorCalendarController::class, 'takeCita'])->name('doctor.calendar.takeCita');
    Route::post('doctor/calendar/finishCita/{id}', [DoctorCalendarController::class, 'finishCita'])->name('doctor.calendar.finishCita');
    Route::post('doctor/calendar/noAssist/{id}', [DoctorCalendarController::class, 'noAssist'])->name('doctor.calendar.noAssist');

    Route::get('doctor/procedimiento/medica-general/{id}', MedicaGeneral::class)->name('doctor.procedimiento.medica-general');
    Route::get('doctor/procedimiento/odontologia/{id}', Odontologia::class)->name('doctor.procedimiento/odontologia');

    Route::get('/buscar-historial', Historial::class)->name('buscar-historial');
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');

    Route::get('user/password', [UserController::class, 'password'])->name('user.password');
    Route::post('user/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword');


});


Auth::routes(["register" => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('doctores', [App\Http\Controllers\HomeController::class, 'getDoctores'])->name('getDoctores');

Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar','Acción cancelada');
})->name('cancelar');

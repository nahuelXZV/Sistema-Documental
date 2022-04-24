<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\administracion\UsuarioController;
use App\Http\Controllers\medico\ClinicaController;
use App\Http\Controllers\administracion\RoleController;
use App\Http\Controllers\medico\atendidosController;
use App\Http\Controllers\medico\ConsultasController;
use App\Http\Controllers\medico\EspecialidadesController;
use App\Http\Controllers\medico\HorarioController;
use App\Http\Controllers\medico\MedicoController;
use App\Http\Controllers\medico\MedicoHorario;
use App\Http\Controllers\paciente\BitacoraController;
use App\Http\Controllers\paciente\ConsultaController;
use App\Http\Controllers\paciente\HistorialController;
use App\Http\Controllers\paciente\ReservasController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('welcome');
    });


    // Route User
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');

    // Route Clinica
    Route::get('/clinicas', [ClinicaController::class, 'index'])->name('clinica.index');
    Route::get('/clinicas/edit/{id}', [ClinicaController::class, 'edit'])->name('clinica.edit');

    // Route Roles y permisos
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    // Route Medicos
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::get('/medicos/edit/{id}', [MedicoController::class, 'edit'])->name('medicos.edit');

    // Route Especialidades
    Route::get('/especialidades', [EspecialidadesController::class, 'index'])->name('especialidades.index');
    Route::get('/especialidades/create', [EspecialidadesController::class, 'create'])->name('especialidades.create');
    Route::get('/especialidades/edit/{id}', [EspecialidadesController::class, 'edit'])->name('especialidades.edit');

    // Route Horarios de atencion
    Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::get('/horarios/edit/{id}', [HorarioController::class, 'edit'])->name('horarios.edit');

    // Route consultas
    Route::get('/consultas', [ConsultasController::class, 'index'])->name('consultas.index');
    Route::get('/consultas/create', [ConsultasController::class, 'create'])->name('consultas.create');
    Route::get('/consultas/edit/{id}', [ConsultasController::class, 'edit'])->name('consultas.edit');

    // Route reservas
    Route::get('/reservas', [ReservasController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create', [ReservasController::class, 'create'])->name('reservas.create');
    Route::get('/reservas/edit/{id}', [ReservasController::class, 'edit'])->name('reservas.edit');

    // Route Medico Horario
    Route::get('/medico_horario', [MedicoHorario::class, 'index'])->name('medico_horario.index');
    Route::get('/medico_horario/create', [MedicoHorario::class, 'create'])->name('medico_horario.create');
    Route::get('/medico_horario/edit/{id}', [MedicoHorario::class, 'edit'])->name('medico_horario.edit');

    // Route historial
    Route::get('/historial/show/{id}', [HistorialController::class, 'index'])->name('historial.index');
    Route::get('/historial/create/{id}/{reservaid}', [HistorialController::class, 'create'])->name('historial.create');
    Route::get('/historial/edit/{id}', [HistorialController::class, 'edit'])->name('historial.edit');

    // Route consultas
    Route::get('/consultas_historial', [ConsultaController::class, 'index'])->name('consultas_historial.index');
    Route::get('/consultas_historial/create', [ConsultaController::class, 'create'])->name('consultas_historial.create');
    Route::get('/consultas_historial/edit/{id}', [ConsultaController::class, 'edit'])->name('consultas_historial.edit');
    Route::get('/consultas_historial/show/{id}', [ConsultaController::class, 'show'])->name('consultas_historial.show');

    // Route bitacora
    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

    // Route atendidos
    Route::get('/atendidos', [atendidosController::class, 'index'])->name('atendidos.index');
});

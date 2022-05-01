<?php

use App\Http\Controllers\api\ApiPacienteController;
use App\Http\Controllers\api\ApiReservaController;
use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);    //GOOD
Route::post('register', [AuthController::class, 'signup']); //G

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::post('signoff',  [AuthController::class, 'signoff']);
    Route::get('pacientes/{id}', [ApiPacienteController::class, 'show']);

    Route::get('especialidades', [ApiReservaController::class, 'especialidades']);
    Route::get('medicos/{id}', [ApiReservaController::class, 'medicos']);
    Route::get('horarios/{especialidad_id}/{medico_id}', [ApiReservaController::class, 'horarios']);
    Route::post('reservar', [ApiReservaController::class, 'reservar']);
    Route::post('reservas', [ApiReservaController::class, 'reservas']);
    Route::delete('cancelar/{id}', [ApiReservaController::class, 'cancelar']);
});

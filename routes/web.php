<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AltaGerenciaController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\SistemaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/recover', function () {
    return view('recover');
});
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('users', UserController::class);
Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('secretarias', SecretariaController::class);
Route::resource('citas', CitaController::class);


Route::prefix('altagerencia')->name('altagerencia.')->group(function () {
    Route::get('/', [AltaGerenciaController::class, 'index'])->name('index');
    Route::get('/consultar-estadisticas', [AltaGerenciaController::class, 'consultarEstadisticas'])->name('consultarEstadisticas');
    Route::get('/exportar-reporte', [AltaGerenciaController::class, 'exportarReporte'])->name('exportarReporte');
    Route::get('/generar-reporte', [AltaGerenciaController::class, 'generarReporte'])->name('generarReporte');
});

Route::resource('historialmedico', HistorialMedicoController::class);
Route::resource('estadisticas', EstadisticaController::class);
Route::resource('notificaciones', NotificacionController::class);
Route::resource('sistemas', SistemaController::class);


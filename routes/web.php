<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Routes for User and Role Management
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        // Routes for managing patients
        Route::get('/admin/patients', [UserController::class, 'indexPatients'])->name('admin.patients.index');
        Route::get('/admin/patients/create', [UserController::class, 'createPatient'])->name('admin.patients.create');
        Route::post('/admin/patients', [UserController::class, 'storePatient'])->name('admin.patients.store');
        Route::get('/admin/patients/{patient}/edit', [UserController::class, 'editPatient'])->name('admin.patients.edit');
        Route::put('/admin/patients/{patient}', [UserController::class, 'updatePatient'])->name('admin.patients.update');
        Route::delete('/admin/patients/{patient}', [UserController::class, 'destroyPatient'])->name('admin.patients.destroy');

        // Routes for managing doctors
        Route::get('/admin/doctors', [UserController::class, 'indexDoctors'])->name('admin.doctors.index');
        Route::get('/admin/doctors/create', [UserController::class, 'createDoctor'])->name('admin.doctors.create');
        Route::post('/admin/doctors', [UserController::class, 'storeDoctor'])->name('admin.doctors.store');
        Route::get('/admin/doctors/{doctor}/edit', [UserController::class, 'editDoctor'])->name('admin.doctors.edit');
        Route::put('/admin/doctors/{doctor}', [UserController::class, 'updateDoctor'])->name('admin.doctors.update');
        Route::delete('/admin/doctors/{doctor}', [UserController::class, 'destroyDoctor'])->name('admin.doctors.destroy');

        // Routes for managing appointments
        Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/admin/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::post('/admin/appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/admin/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::put('/admin/appointments/{appointment}', [AppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::delete('/admin/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

        // Routes for managing roles
        Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('/admin/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

        Route::get('/admin/assign-role', [RoleController::class, 'assign'])->name('admin.assign-role');
        Route::post('/admin/assign-role', [RoleController::class, 'storeAssignment'])->name('admin.assign-role.store');
    });

    // Routes for managing appointments
    Route::middleware(['role:Admin|Doctor'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('appointments', AppointmentController::class);
    });
    Route::middleware(['role:Admin|Doctor'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('doctors', DoctorController::class);
    });

    // Routes for managing availability
    Route::middleware(['role:Admin|Doctor'])->group(function () {
        Route::get('/admin/availability/{doctor}', [AvailabilityController::class, 'index'])->name('admin.availability.index');
        Route::post('/admin/availability', [AvailabilityController::class, 'store'])->name('admin.availability.store');
        Route::put('/admin/availability/{id}', [AvailabilityController::class, 'update'])->name('admin.availability.update');
        Route::delete('/admin/availability/{id}', [AvailabilityController::class, 'destroy'])->name('admin.availability.destroy');
        Route::get('/admin/availability', [AvailabilityController::class, 'index'])->name('admin.availability.index');
        Route::get('/admin/availability/create', [AvailabilityController::class, 'create'])->name('admin.availability.create');
        Route::post('/admin/availability', [AvailabilityController::class, 'store'])->name('admin.availability.store');
        Route::get('/admin/availability/{id}/edit', [AvailabilityController::class, 'edit'])->name('admin.availability.edit');
        Route::put('/admin/availability/{id}', [AvailabilityController::class, 'update'])->name('admin.availability.update');
        Route::delete('/admin/availability/{id}', [AvailabilityController::class, 'destroy'])->name('admin.availability.destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('appointments', AppointmentController::class);
});

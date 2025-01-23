<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');



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

        Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('/admin/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

        Route::get('/admin/assign-role', [RoleController::class, 'assign'])->name('admin.assign-role');
        Route::post('/admin/assign-role', [RoleController::class, 'storeAssignment'])->name('admin.assign-role.store');

    });
});

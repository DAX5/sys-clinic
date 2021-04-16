<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('pacientes/list', [PacienteController::class, 'getPacientes'])->name('pacientes.list');

Route::resource('pacientes', PacienteController::class);

Route::get('medicos/list', [MedicoController::class, 'getMedicos'])->name('medicos.list');

Route::resource('medicos', MedicoController::class);

Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');

Route::resource('users', UserController::class);

require __DIR__.'/auth.php';

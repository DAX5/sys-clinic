<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AgendamentoController;

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
    return redirect()->route('agendamentos.index');
})->middleware(['auth']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('pacientes/list', [PacienteController::class, 'getPacientes'])->name('pacientes.list')->middleware(['auth']);

Route::resource('pacientes', PacienteController::class)->middleware(['auth']);

Route::get('medicos/list', [MedicoController::class, 'getMedicos'])->name('medicos.list')->middleware(['auth']);

Route::resource('medicos', MedicoController::class)->middleware(['auth'])->middleware(['auth']);

Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');

Route::resource('users', UserController::class)->middleware(['auth']);

Route::get('agendamentos/list', [AgendamentoController::class, 'getAgendamentos'])->name('agendamentos.list')->middleware(['auth']);

Route::resource('agendamentos', AgendamentoController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

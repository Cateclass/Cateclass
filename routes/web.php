<?php

use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RespostaController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;

// rotas de inicio
Route::get('/', function () {
    return view('welcome');
})->name('inicio');
Route::get('/sobre', function() {
    return view('sobre');
})->name('sobre');

// rota da dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// rotas do catequista
Route::get('/turmas', [TurmaController::class, 'index'])->middleware(['auth', 'verified'])->name('catequista.turmas');
Route::get('/catequista/atividades', [AtividadeController::class, 'index'])->middleware(['auth', 'verified'])->name('catequista.atividades');
Route::get('/criarTurma', [TurmaController::class, 'create'])->middleware(['auth', 'verified'])->name('catequista.criarTurma');
Route::post('/criarTurmaSubmit', [TurmaController::class, 'store'])->middleware(['auth', 'verified'])->name('catequista.criarTurmaSubmit');
Route::get('/verTurma/{turma}', [TurmaController::class, 'show'])->middleware(['auth', 'verified'])->name('catequista.verTurma');
Route::get('/catequista/turma/{turma}/editar', [TurmaController::class, 'edit'])->middleware(['auth', 'verified'])->name('catequista.editarTurma');
Route::put('/editarTurma/{turma}', [TurmaController::class, 'update'])->middleware(['auth', 'verified'])->name('catequista.editarTurmaSubmit');
Route::delete('/deletarTurma/{turma}', [TurmaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('catequista.deleteTurma');
Route::get('/criarAtividade', [AtividadeController::class, 'create'])->middleware(['auth', 'verified'])->name('catequista.criarAtividade');
Route::post('/criarAtividadeSubmit', [AtividadeController::class, 'store'])->middleware(['auth', 'verified'])->name('catequista.criarAtividadeSubmit');

// rotas do catequizando
Route::get('/catequizando/entrarTurma', [TurmaController::class, 'entrarTurma'])->middleware(['auth', 'verified'])->name('catequizando.entrarTurma');
Route::post('/catequizando/matricular', [TurmaController::class, 'matricular'])->middleware(['auth', 'verified'])->name('catequizando.matricular');
Route::get('/atividades', [AtividadeController::class, 'index'])->middleware(['auth', 'verified'])->name('catequizando.atividades');
Route::get('/atividade/{atividade}', [AtividadeController::class, 'show'])->middleware(['auth', 'verified'])->name('catequizando.verAtividade');
Route::post('/atividade/responder', [RespostaController::class, 'store'])->middleware(['auth', 'verified'])->name('catequizando.responder');
Route::delete('/atividade/cancelar', [RespostaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('catequizando.cancelar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

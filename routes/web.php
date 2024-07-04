<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PalavraController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\IndexController;

// Rotas de View
Route::get('/', [IndexController::class, 'index'])->name('index.index');
Route::get('palavras/cadastrar', [PalavraController::class, 'cadastrar'])->name('palavras.cadastrar');
Route::get('grupos/cadastrar', [GrupoController::class, 'cadastrar'])->name('grupos.cadastrar');
Route::get('jogos', [JogosController::class, 'jogar'])->name('jogo.jogo');

Route::resource('palavras', PalavraController::class);
Route::resource('grupos', GrupoController::class);

// Rotas para gravar
Route::post('grupos/cadastrar', [GrupoController::class, 'gravar'])->name('grupos.gravar');
Route::post('palavras/cadastrar', [PalavraController::class, 'gravar'])->name('palavras.gravar');
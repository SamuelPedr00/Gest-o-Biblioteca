<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name("index");
Route::get('/emprestimo', [\App\Http\Controllers\EmprestimoController::class, 'index'])->name("emprestimo");
Route::get('/genero', [\App\Http\Controllers\GeneroController::class, 'index'])->name("genero");
Route::get('/livro', [\App\Http\Controllers\LivroController::class, 'index'])->name("livro");
Route::get('/informativo', [\App\Http\Controllers\LivroController::class, 'informativo'])->name("informativo");
Route::get('/usuario', [\App\Http\Controllers\UsuarioController::class, 'index'])->name("usuario");

Route::post('/adicionausuario', [\App\Http\Controllers\UsuarioController::class, 'adicionaUsuario'])->name("adicionaUsuario");
Route::post('/desativausuario', [\App\Http\Controllers\UsuarioController::class, 'desativaUsuario'])->name("desativaUsuario");
Route::post('/ativausuario', [\App\Http\Controllers\UsuarioController::class, 'ativaUsuario'])->name("ativaUsuario");
Route::post('/editausuario', [\App\Http\Controllers\UsuarioController::class, 'editaUsuario'])->name("editaUsuario");

Route::post('/adicionalivro', [\App\Http\Controllers\LivroController::class, 'adicionaLivro'])->name("adicionaLivro");
Route::post('/desativalivro', [\App\Http\Controllers\LivroController::class, 'desativaLivro'])->name("desativaLivro");
Route::post('/ativalivro', [\App\Http\Controllers\LivroController::class, 'ativaLivro'])->name("ativaLivro");
Route::post('/editalivro', [\App\Http\Controllers\LivroController::class, 'editaLivro'])->name("editaLivro");

Route::post('/adicionagenero', [\App\Http\Controllers\GeneroController::class, 'adicionaGenero'])->name("adicionaGenero");
Route::post('/desativagenero', [\App\Http\Controllers\GeneroController::class, 'desativaGenero'])->name("desativaGenero");
Route::post('/ativagenero', [\App\Http\Controllers\GeneroController::class, 'ativaGenero'])->name("ativaGenero");
Route::post('/editagenero', [\App\Http\Controllers\GeneroController::class, 'editaGenero'])->name("editaGenero");

Route::post('/adicionaemprestimo', [\App\Http\Controllers\EmprestimoController::class, 'adicionaEmprestimo'])->name("adicionaEmprestimo");
Route::post('/recebeemprestimo', [\App\Http\Controllers\EmprestimoController::class, 'recebeEmprestimo'])->name("recebeEmprestimo");

Route::post('/adicionagenerolivro', [\App\Http\Controllers\LivroGeneroController::class, 'adicionaGeneroLivro'])->name("adicionaGeneroLivro");
Route::post('/removegeneroLivro', [\App\Http\Controllers\LivroGeneroController::class, 'removeGeneroLivro'])->name("removeGeneroLivro");

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Baixa_PatrimonialController;
use App\Http\Controllers\BemexcedenteController;
use App\Http\Controllers\DevolucaoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CedidoController;
use App\Http\Controllers\ComodoController;

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
    return view('welcome');
});

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::get('/logout', [CustomAuthController::class, 'signOut'])->middleware(['auth'])->name('logout');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->middleware(['auth'])->name('perfil');
Route::get('/perfil/edit', [App\Http\Controllers\HomeController::class, 'editPerfil'])->middleware(['auth'])->name('editPerfil');
Route::put('/perfil/update/{id}', [App\Http\Controllers\HomeController::class, 'updatePerfil'])->middleware(['auth'])->name('updatePerfil');

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware(['auth'])->name('usuarios.index');
    Route::get('/buscar', [UserController::class, 'indexBuscar'])->middleware(['auth'])->name('usuarios.indexBuscar');
    Route::get('/', [UserController::class, 'index'])->middleware(['auth'])->name('usuarios.index')->middleware('can:access');
    Route::get('/show/{id}', [UserController::class, 'show'])->middleware(['auth'])->name('usuarios.show')->middleware('can:access');
    Route::get('/create', [UserController::class, 'create'])->middleware(['auth'])->name('usuarios.create')->middleware('can:access');
    Route::post('/store', [UserController::class, 'store'])->middleware(['auth'])->name('usuarios.store')->middleware('can:access');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware(['auth'])->name('usuarios.edit')->middleware('can:access');
    Route::put('/update/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('usuarios.update')->middleware('can:access');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('usuarios.delete')->middleware('can:access');
});

Route::prefix('patrimonios')->group(function () {
    Route::get('/', [PatrimonioController::class, 'index'])->middleware(['auth'])->name('patrimonios.index');
    Route::get('/buscar', [PatrimonioController::class, 'indexBuscar'])->middleware(['auth'])->name('patrimonios.indexBuscar');
    Route::get('/show/{id}', [PatrimonioController::class, 'show'])->middleware(['auth'])->name('patrimonios.show');
    Route::get('/create', [PatrimonioController::class, 'create'])->middleware(['auth'])->name('patrimonios.create')->middleware('can:access');
    Route::post('/store', [PatrimonioController::class, 'store'])->middleware(['auth'])->name('patrimonios.store')->middleware('can:access');
    Route::get('/edit/{id}', [PatrimonioController::class, 'edit'])->middleware(['auth'])->name('patrimonios.edit')->middleware('can:access');
    Route::post('/update/{id}', [PatrimonioController::class, 'update'])->middleware(['auth'])->name('patrimonios.update')->middleware('can:access');
    Route::delete('/delete/{id}', [PatrimonioController::class, 'destroy'])->middleware(['auth'])->name('patrimonios.delete')->middleware('can:access');
});

Route::prefix('entradas/show/{id1}/patrimonios')->group(function () {
    Route::get('/create/{id2}', [PatrimonioController::class, 'createpatrientrada'])->middleware(['auth'])->name('patrientrada.create')->middleware('can:access');
    Route::post('/store', [PatrimonioController::class, 'storepatrientrada'])->middleware(['auth'])->name('patrientrada.store')->middleware('can:access');
});

Route::prefix('entradas')->group(function () {
    Route::get('/buscar', [EntradaController::class, 'indexBuscar'])->middleware(['auth'])->name('entradas.indexBuscar');
    Route::get('/', [EntradaController::class, 'index'])->middleware(['auth'])->name('entradas.index');
    Route::get('/show/{id}', [EntradaController::class, 'show'])->middleware(['auth'])->name('entradas.show');
    Route::get('/create', [EntradaController::class, 'create'])->middleware(['auth'])->name('entradas.create')->middleware('can:access');
    Route::post('/store', [EntradaController::class, 'store'])->middleware(['auth'])->name('entradas.store')->middleware('can:access');
    Route::get('/edit/{id}', [EntradaController::class, 'edit'])->middleware(['auth'])->name('entradas.edit')->middleware('can:access');
    Route::post('/update/{id}', [EntradaController::class, 'update'])->middleware(['auth'])->name('entradas.update')->middleware('can:access');
    Route::delete('/delete/{id}', [EntradaController::class, 'destroy'])->middleware(['auth'])->name('entradas.delete')->middleware('can:access');
});

Route::prefix('setores')->group(function () {
    Route::get('/buscar', [SetorController::class, 'indexBuscar'])->middleware(['auth'])->name('setores.indexBuscar');
    Route::get('/', [SetorController::class, 'index'])->middleware(['auth'])->name('setores.index');
    Route::get('/show/{id}', [SetorController::class, 'show'])->middleware(['auth'])->name('setores.show');
    Route::get('/create', [SetorController::class, 'create'])->middleware(['auth'])->name('setores.create')->middleware('can:access');
    Route::post('/store', [SetorController::class, 'store'])->middleware(['auth'])->name('setores.store')->middleware('can:access');
    Route::get('/edit/{id}', [SetorController::class, 'edit'])->middleware(['auth'])->name('setores.edit')->middleware('can:access');
    Route::post('/update/{id}', [SetorController::class, 'update'])->middleware(['auth'])->name('setores.update')->middleware('can:access');
    Route::delete('/delete/{id}', [SetorController::class, 'destroy'])->middleware(['auth'])->name('setores.delete')->middleware('can:access');
});

Route::prefix('manutencoes')->group(function () {
    Route::get('/', [ManutencaoController::class, 'index'])->middleware(['auth'])->name('manutencoes.index');
    Route::get('/buscar', [ManutencaoController::class, 'indexBuscar'])->middleware(['auth'])->name('manutencoes.indexBuscar');
    Route::get('/show/{id}', [ManutencaoController::class, 'show'])->middleware(['auth'])->name('manutencoes.show');
    Route::get('/create', [ManutencaoController::class, 'create'])->middleware(['auth'])->name('manutencoes.create');
    Route::get('/create/{id}', [ManutencaoController::class, 'create'])->middleware(['auth'])->name('manutencoes.create_specific');
    Route::post('/store', [ManutencaoController::class, 'store'])->middleware(['auth'])->name('manutencoes.store')->middleware('can:access');
    Route::get('/edit/{id}', [ManutencaoController::class, 'edit'])->middleware(['auth'])->name('manutencoes.edit')->middleware('can:access');
    Route::put('/update/{id}', [ManutencaoController::class, 'update'])->middleware(['auth'])->name('manutencoes.update')->middleware('can:access');
    Route::delete('/delete/{id}', [ManutencaoController::class, 'destroy'])->middleware(['auth'])->name('manutencoes.delete')->middleware('can:access');
    Route::post('/manutencao/{id}/recebido', [ManutencaoController::class, 'recebido'])->name('manutencoes.recebido');
});

Route::prefix('bensexcedentes')->group(function () {
    Route::get('/buscar', [BemexcedenteController::class, 'indexBuscar'])->middleware(['auth'])->name('bensexcedentes.indexBuscar');
    Route::get('/', [BemexcedenteController::class, 'index'])->middleware(['auth'])->name('bensexcedentes.index');
    Route::get('/show/{id}', [BemexcedenteController::class, 'show'])->middleware(['auth'])->name('bensexcedentes.show');
    Route::get('/create', [BemexcedenteController::class, 'create'])->middleware(['auth'])->name('bensexcedentes.create')->middleware('can:access');
    Route::post('/store', [BemexcedenteController::class, 'store'])->middleware(['auth'])->name('bensexcedentes.store')->middleware('can:access');
    Route::get('/edit/{id}', [BemexcedenteController::class, 'edit'])->middleware(['auth'])->name('bensexcedentes.edit')->middleware('can:access');
    Route::post('/update/{id}', [BemexcedenteController::class, 'update'])->middleware(['auth'])->name('bensexcedentes.update')->middleware('can:access');
    Route::delete('/delete/{id}', [BemexcedenteController::class, 'destroy'])->middleware(['auth'])->name('bensexcedentes.delete')->middleware('can:access');
});

Route::prefix('baixas_patrimoniais')->group(function () {
    Route::get('/buscar', [Baixa_PatrimonialController::class, 'indexBuscar'])->middleware(['auth'])->name('baixas_patrimoniais.indexBuscar');
    Route::get('/', [Baixa_PatrimonialController::class, 'index'])->middleware(['auth'])->name('baixas_patrimoniais.index');
    Route::get('/show/{id}', [Baixa_PatrimonialController::class, 'show'])->middleware(['auth'])->name('baixas_patrimoniais.show');
    Route::get('/create', [Baixa_PatrimonialController::class, 'create'])->middleware(['auth'])->name('baixas_patrimoniais.create');
    Route::get('/create/{id}', [Baixa_PatrimonialController::class, 'create'])->middleware(['auth'])->name('baixas_patrimoniais.create_specific');
    Route::post('/store', [Baixa_PatrimonialController::class, 'store'])->middleware(['auth'])->name('baixas_patrimoniais.store')->middleware('can:access');
    Route::get('/edit/{id}', [Baixa_PatrimonialController::class, 'edit'])->middleware(['auth'])->name('baixas_patrimoniais.edit')->middleware('can:access');
    Route::post('/update/{id}', [Baixa_PatrimonialController::class, 'update'])->middleware(['auth'])->name('baixas_patrimoniais.update')->middleware('can:access');
    Route::delete('/delete/{id}', [Baixa_PatrimonialController::class, 'destroy'])->middleware(['auth'])->name('baixas_patrimoniais.delete')->middleware('can:access');
});

// OS USUÁRIOS COMUNS PODERÃO REALIZAR O CRUD DE RESERVA, EMPRESTIMO E DEVOLUÇÃO, DESDE QUE SEJAM DE SEUS ITENS.
Route::prefix('reservas')->group(function () {
    Route::get('/buscar', [ReservaController::class, 'indexBuscar'])->middleware(['auth'])->name('reservas.indexBuscar');
    Route::get('/', [ReservaController::class, 'index'])->middleware(['auth'])->name('reservas.index');
    Route::get('/show/{id}', [ReservaController::class, 'show'])->middleware(['auth'])->name('reservas.show');
    Route::get('/create', [ReservaController::class, 'create'])->middleware(['auth'])->name('reservas.create');
    Route::post('/store', [ReservaController::class, 'store'])->middleware(['auth'])->name('reservas.store');
    Route::get('/edit/{id}', [ReservaController::class, 'edit'])->middleware(['auth'])->name('reservas.edit');
    Route::put('/update/{id}', [ReservaController::class, 'update'])->middleware(['auth'])->name('reservas.update');
    Route::delete('/delete/{id}', [ReservaController::class, 'destroy'])->middleware(['auth'])->name('reservas.delete');
});

Route::prefix('emprestimos')->group(function () {
    Route::get('/buscar', [EmprestimoController::class, 'indexBuscar'])->middleware(['auth'])->name('emprestimos.indexBuscar');
    Route::get('/', [EmprestimoController::class, 'index'])->middleware(['auth'])->name('emprestimos.index');
    Route::get('/show/{id}', [EmprestimoController::class, 'show'])->middleware(['auth'])->name('emprestimos.show');
    Route::get('/create', [EmprestimoController::class, 'create'])->middleware(['auth'])->name('emprestimos.create');
    Route::post('/store', [EmprestimoController::class, 'store'])->middleware(['auth'])->name('emprestimos.store');
    Route::get('/edit/{id}', [EmprestimoController::class, 'edit'])->middleware(['auth'])->name('emprestimos.edit');
    Route::put('/update/{id}', [EmprestimoController::class, 'update'])->middleware(['auth'])->name('emprestimos.update');
    Route::delete('/delete/{id}', [EmprestimoController::class, 'destroy'])->middleware(['auth'])->name('emprestimos.delete');
});

Route::prefix('devolucoes')->group(function () {
    Route::get('/buscar', [DevolucaoController::class, 'indexBuscar'])->middleware(['auth'])->name('devolucoes.indexBuscar');
    Route::get('/', [DevolucaoController::class, 'index'])->middleware(['auth'])->name('devolucoes.index');
    Route::get('/show/{id}', [DevolucaoController::class, 'show'])->middleware(['auth'])->name('devolucoes.show');
    Route::get('/create', [DevolucaoController::class, 'create'])->middleware(['auth'])->name('devolucoes.create');
    Route::post('/store', [DevolucaoController::class, 'store'])->middleware(['auth'])->name('devolucoes.store');
    Route::get('/edit/{id}', [DevolucaoController::class, 'edit'])->middleware(['auth'])->name('devolucoes.edit');
    Route::put('/update/{id}', [DevolucaoController::class, 'update'])->middleware(['auth'])->name('devolucoes.update');
    Route::delete('/delete/{id}', [DevolucaoController::class, 'destroy'])->middleware(['auth'])->name('devolucoes.delete');
});

Route::prefix('comodos')->group(function () {
    Route::get('/buscar', [ComodoController::class, 'indexBuscar'])->middleware(['auth'])->name('comodos.indexBuscar');
    Route::get('/', [ComodoController::class, 'index'])->middleware(['auth'])->name('comodos.index');
    Route::get('/show/{id}', [ComodoController::class, 'show'])->middleware(['auth'])->name('comodos.show');
    Route::get('/create', [ComodoController::class, 'create'])->middleware(['auth'])->name('comodos.create')->middleware('can:access');
    Route::post('/store', [ComodoController::class, 'store'])->middleware(['auth'])->name('comodos.store')->middleware('can:access');
    Route::get('/edit/{id}', [ComodoController::class, 'edit'])->middleware(['auth'])->name('comodos.edit')->middleware('can:access');
    Route::put('/update/{id}', [ComodoController::class, 'update'])->middleware(['auth'])->name('comodos.update')->middleware('can:access');
    Route::delete('/{id}', [ComodoController::class, 'destroy'])->middleware(['auth'])->name('comodos.delete')->middleware('can:access');
});

Route::prefix('cedidos')->group(function () {
    Route::get('/buscar', [CedidoController::class, 'indexBuscar'])->middleware(['auth'])->name('cedidos.indexBuscar');
    Route::get('/', [CedidoController::class, 'index'])->middleware(['auth'])->name('cedidos.index');
    Route::get('/show/{id}', [CedidoController::class, 'show'])->middleware(['auth'])->name('cedidos.show');
    Route::get('/create', [CedidoController::class, 'create'])->middleware(['auth'])->name('cedidos.create')->middleware('can:access');
    Route::post('/store', [CedidoController::class, 'store'])->middleware(['auth'])->name('cedidos.store')->middleware('can:access');
    Route::get('/edit/{id}', [CedidoController::class, 'edit'])->middleware(['auth'])->name('cedidos.edit')->middleware('can:access');
    Route::put('/update/{id}', [CedidoController::class, 'update'])->middleware(['auth'])->name('cedidos.update')->middleware('can:access');
    Route::delete('/{id}', [CedidoController::class, 'destroy'])->middleware(['auth'])->name('cedidos.delete')->middleware('can:access');
});

require __DIR__ . '/auth.php';
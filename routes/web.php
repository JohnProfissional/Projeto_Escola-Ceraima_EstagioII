<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; 
use App\Http\Controllers\Baixa_PatrimonialController;
use App\Http\Controllers\BemexcedenteController;
use App\Http\Controllers\DesaparecidoController;
use App\Http\Controllers\DevolucaoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\ItensdevolucaoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ItensentradaController;
use App\Http\Controllers\ItenssaidaController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\Patrimonio_InservivelController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
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
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register-user'); 
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

Route::get('/logout', [CustomAuthController::class, 'signOut'])->middleware(['auth'])->name('logout');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/admin/home', [HomeController::class, 'adminHome'])->middleware('is_admin')->name('admin.home');
Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->middleware(['auth'])->name('perfil');


Route::prefix('usuarios')->group(function () {
    Route::get('/',[UsuarioController::class,'index'])->middleware(['auth'])->name('usuarios.index');
    Route::get('/show/{id}',[UsuarioController::class,'show'])->middleware(['auth'])->name('usuarios.show');
    Route::get('/create',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuarios.create');
    Route::post('/store',[UsuarioController::class,'store'])->middleware(['auth'])->name('usuarios.store');
    Route::get('/edit/{id}',[UsuarioController::class,'edit'])->middleware(['auth'])->name('usuarios.edit');
    Route::post('/update/{id}',[UsuarioController::class,'update'])->middleware(['auth'])->name('usuarios.update');
    Route::delete('/delete/{id}',[UsuarioController::class,'destroy'])->middleware(['auth'])->name('usuarios.detroy');
});

Route::prefix('patrimonios')->group(function () {
    Route::get('/',[PatrimonioController::class,'index'])->middleware(['auth'])->name('patrimonios.index');
    Route::get('/show/{id}',[PatrimonioController::class,'show'])->middleware(['auth'])->name('patrimonios.show');
    Route::get('/create',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonios.create');
    Route::post('/store',[PatrimonioController::class,'store'])->middleware(['auth'])->name('patrimonios.store');
    Route::get('/edit/{id}',[PatrimonioController::class,'edit'])->middleware(['auth'])->name('patrimonios.edit');
    Route::post('/update/{id}',[PatrimonioController::class,'update'])->middleware(['auth'])->name('patrimonios.update');
    Route::delete('/delete/{id}',[PatrimonioController::class,'destroy'])->middleware(['auth'])->name('patrimonios.delete');
});

Route::prefix('entradas')->group(function () {
    Route::get('/',[EntradaController::class,'index'])->middleware(['auth'])->name('entradas.index');
    Route::get('/show/{id}',[EntradaController::class,'show'])->middleware(['auth'])->name('entradas.show');
    Route::get('/create',[EntradaController::class,'create'])->middleware(['auth'])->name('entradas.create');
    Route::post('/store',[EntradaController::class,'store'])->middleware(['auth'])->name('entradas.store');
    Route::get('/edit/{id}',[EntradaController::class,'edit'])->middleware(['auth'])->name('entradas.edit');
    Route::post('/update/{id}',[EntradaController::class,'update'])->middleware(['auth'])->name('entradas.update');
    Route::delete('/delete/{id}',[EntradaController::class,'destroy'])->middleware(['auth'])->name('entradas.delete');
});

Route::prefix('itensentradas')->group(function () {
    Route::get('/',[ItensentradaController::class,'index'])->middleware(['auth'])->name('itensentradas.index');
    Route::get('/show/{id}',[ItensentradaController::class,'show'])->middleware(['auth'])->name('itensentradas.show');
    Route::get('/create',[ItensentradaController::class,'create'])->middleware(['auth'])->name('itensentradas.create');
    Route::post('/store',[ItensentradaController::class,'store'])->middleware(['auth'])->name('itensentradas.store');
    Route::get('/edit/{id}',[ItensentradaController::class,'edit'])->middleware(['auth'])->name('itensentradas.edit');
    Route::post('/update/{id}',[ItensentradaController::class,'update'])->middleware(['auth'])->name('itensentradas.update');
    Route::delete('/delete/{id}',[ItensentradaController::class,'destroy'])->middleware(['auth'])->name('itensentradas.delete');
});

Route::prefix('setores')->group(function () {
    Route::get('/',[SetorController::class,'index'])->middleware(['auth'])->name('setores.index');
    Route::get('/show/{id}',[SetorController::class,'show'])->middleware(['auth'])->name('setores.show');
    Route::get('/create',[SetorController::class,'create'])->middleware(['auth'])->name('setores.create');
    Route::post('/store',[SetorController::class,'store'])->middleware(['auth'])->name('setores.store');
    Route::get('/edit/{id}',[SetorController::class,'edit'])->middleware(['auth'])->name('setores.edit');
    Route::post('/update/{id}',[SetorController::class,'update'])->middleware(['auth'])->name('setores.update');
    Route::delete('/delete/{id}',[SetorController::class,'destroy'])->middleware(['auth'])->name('setores.delete');
});

Route::prefix('saidas')->group(function () {
    Route::get('/',[SaidaController::class,'index'])->middleware(['auth'])->name('saidas.index');
    Route::get('/show/{id}',[SaidaController::class,'show'])->middleware(['auth'])->name('saidas.show');
    Route::get('/create',[SaidaController::class,'create'])->middleware(['auth'])->name('saidas.create');
    Route::post('/store',[SaidaController::class,'store'])->middleware(['auth'])->name('saidas.store');
    Route::get('/edit/{id}',[SaidaController::class,'edit'])->middleware(['auth'])->name('saidas.edit');
    Route::post('/update/{id}',[SaidaController::class,'update'])->middleware(['auth'])->name('saidas.update');
    Route::delete('/delete/{id}',[SaidaController::class,'destroy'])->middleware(['auth'])->name('saidas.delete');
});

Route::prefix('itenssaidas')->group(function () {
    Route::get('/',[ItenssaidaController::class,'index'])->middleware(['auth'])->name('itenssaidas.index');
    Route::get('/show/{id}',[ItenssaidaController::class,'show'])->middleware(['auth'])->name('itenssaidas.show');
    Route::get('/create',[ItenssaidaController::class,'create'])->middleware(['auth'])->name('itenssaidas.create');
    Route::post('/store',[ItenssaidaController::class,'store'])->middleware(['auth'])->name('itenssaidas.store');
    Route::get('/edit/{id}',[ItenssaidaController::class,'edit'])->middleware(['auth'])->name('itenssaidas.edit');
    Route::post('/update/{id}',[ItenssaidaController::class,'update'])->middleware(['auth'])->name('itenssaidas.update');
    Route::delete('/delete/{id}',[ItenssaidaController::class,'destroy'])->middleware(['auth'])->name('saidas.delete');
});

Route::prefix('patrimoniosinserviveis')->group(function () {
    Route::get('/',[Patrimonio_InservivelController::class,'index'])->middleware(['auth'])->name('patrimoniosinserviveis.index');
    Route::get('/show/{id}',[Patrimonio_InservivelController::class,'show'])->middleware(['auth'])->name('patrimoniosinserviveis.show');
    Route::get('/create',[Patrimonio_InservivelController::class,'create'])->middleware(['auth'])->name('patrimoniosinserviveis.create');
    Route::post('/store',[Patrimonio_InservivelController::class,'store'])->middleware(['auth'])->name('patrimoniosinserviveis.store');
    Route::get('/edit/{id}',[Patrimonio_InservivelController::class,'edit'])->middleware(['auth'])->name('patrimoniosinserviveis.edit');
    Route::post('/update/{id}',[Patrimonio_InservivelController::class,'update'])->middleware(['auth'])->name('patrimoniosinserviveis.update');
    Route::delete('/delete/{id}',[Patrimonio_InservivelController::class,'destroy'])->middleware(['auth'])->name('patrimoniosinserviveis.delete');
});

Route::prefix('manutencoes')->group(function () {
    Route::get('/',[ManutencaoController::class,'index'])->middleware(['auth'])->name('manutencoes.index');
    Route::get('/show/{id}',[ManutencaoController::class,'show'])->middleware(['auth'])->name('manutencoes.show');
    Route::get('/create',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencoes.create');
    Route::post('/store',[ManutencaoController::class,'store'])->middleware(['auth'])->name('manutencoes.store');
    Route::get('/edit/{id}',[ManutencaoController::class,'edit'])->middleware(['auth'])->name('manutencoes.edit');
    Route::post('/update/{id}',[ManutencaoController::class,'update'])->middleware(['auth'])->name('manutencoes.update');
    Route::delete('/delete/{id}',[ManutencaoController::class,'destroy'])->middleware(['auth'])->name('manutencoes.delete');
});

Route::prefix('reservas')->group(function () {
    Route::get('/',[ReservaController::class,'index'])->middleware(['auth'])->name('reservas.index');
    Route::get('/show/{id}',[ReservaController::class,'show'])->middleware(['auth'])->name('reservas.show');
    Route::get('/create',[ReservaController::class,'create'])->middleware(['auth'])->name('reservas.create');
    Route::post('/store',[ReservaController::class,'store'])->middleware(['auth'])->name('reservas.store');
    Route::get('/edit/{id}',[ReservaController::class,'edit'])->middleware(['auth'])->name('reservas.edit');
    Route::post('/update/{id}',[ReservaController::class,'update'])->middleware(['auth'])->name('reservas.update');
    Route::delete('/delete/{id}',[ReservaController::class,'destroy'])->middleware(['auth'])->name('reservas.delete');
});

Route::prefix('bensexcedentes')->group(function () {
    Route::get('/',[BemexcedenteController::class,'index'])->middleware(['auth'])->name('bensexcedentes.index');
    Route::get('/show/{id}',[BemexcedenteController::class,'show'])->middleware(['auth'])->name('bensexcedentes.show');
    Route::get('/create',[BemexcedenteController::class,'create'])->middleware(['auth'])->name('bensexcedentes.create');
    Route::post('/store',[BemexcedenteController::class,'store'])->middleware(['auth'])->name('bensexcedentes.store');
    Route::get('/edit/{id}',[BemexcedenteController::class,'edit'])->middleware(['auth'])->name('bensexcedentes.edit');
    Route::post('/update/{id}',[BemexcedenteController::class,'update'])->middleware(['auth'])->name('bensexcedentes.update');
    Route::delete('/delete/{id}',[BemexcedenteController::class,'destroy'])->middleware(['auth'])->name('bensexcedentes.delete');
});

Route::prefix('desaparecidos')->group(function () {
    Route::get('/',[DesaparecidoController::class,'index'])->middleware(['auth'])->name('desaparecidos.index');
    Route::get('/show/{id}',[DesaparecidoController::class,'show'])->middleware(['auth'])->name('desaparecidos.show');
    Route::get('/create',[DesaparecidoController::class,'create'])->middleware(['auth'])->name('desaparecidos.create');
    Route::post('/store',[DesaparecidoController::class,'store'])->middleware(['auth'])->name('desaparecidos.store');
    Route::get('/edit/{id}',[DesaparecidoController::class,'edit'])->middleware(['auth'])->name('desaparecidos.edit');
    Route::post('/update/{id}',[DesaparecidoController::class,'update'])->middleware(['auth'])->name('desaparecidos.update');
    Route::delete('/delete/{id}',[DesaparecidoController::class,'destroy'])->middleware(['auth'])->name('desaparecidos.delete');
});

Route::prefix('baixas_patrimoniais')->group(function () {
    Route::get('/',[Baixa_PatrimonialController::class,'index'])->middleware(['auth'])->name('baixas_patrimoniais.index');
    Route::get('/show/{id}',[Baixa_PatrimonialController::class,'show'])->middleware(['auth'])->name('baixas_patrimoniais.show');
    Route::get('/create',[Baixa_PatrimonialController::class,'create'])->middleware(['auth'])->name('baixas_patrimoniais.create');
    Route::post('/store',[Baixa_PatrimonialController::class,'store'])->middleware(['auth'])->name('baixas_patrimoniais.store');
    Route::get('/edit/{id}',[Baixa_PatrimonialController::class,'edit'])->middleware(['auth'])->name('baixas_patrimoniais.edit');
    Route::post('/update/{id}',[Baixa_PatrimonialController::class,'update'])->middleware(['auth'])->name('baixas_patrimoniais.update');
    Route::delete('/delete/{id}',[Baixa_PatrimonialController::class,'destroy'])->middleware(['auth'])->name('baixas_patrimoniais.delete');
});

Route::prefix('emprestimos')->group(function () {
    Route::get('/',[EmprestimoController::class,'index'])->middleware(['auth'])->name('emprestimos.index');
    Route::get('/show/{id}',[EmprestimoController::class,'show'])->middleware(['auth'])->name('emprestimos.show');
    Route::get('/create',[EmprestimoController::class,'create'])->middleware(['auth'])->name('emprestimos.create');
    Route::post('/store',[EmprestimoController::class,'store'])->middleware(['auth'])->name('emprestimos.store');
    Route::get('/edit/{id}',[EmprestimoController::class,'edit'])->middleware(['auth'])->name('emprestimos.edit');
    Route::post('/update/{id}',[EmprestimoController::class,'update'])->middleware(['auth'])->name('emprestimos.update');
    Route::delete('/delete/{id}',[EmprestimoController::class,'destroy'])->middleware(['auth'])->name('emprestimos.delete');
});

Route::prefix('itensdevolucoes')->group(function () {
    Route::get('/',[ItensdevolucaoController::class,'index'])->middleware(['auth'])->name('itensdevolucoes.index');
    Route::get('/show/{id}',[ItensdevolucaoController::class,'show'])->middleware(['auth'])->name('itensdevolucoes.show');
    Route::get('/create',[ItensdevolucaoController::class,'create'])->middleware(['auth'])->name('itensdevolucoes.create');
    Route::post('/store',[ItensdevolucaoController::class,'store'])->middleware(['auth'])->name('itensdevolucoes.store');
    Route::get('/edit/{id}',[ItensdevolucaoController::class,'edit'])->middleware(['auth'])->name('itensdevolucoes.edit');
    Route::post('/update/{id}',[ItensdevolucaoController::class,'update'])->middleware(['auth'])->name('itensdevolucoes.update');
    Route::delete('/delete/{id}',[ItensdevolucaoController::class,'destroy'])->middleware(['auth'])->name('itensdevolucoes.delete');
});

Route::prefix('devolucoes')->group(function () {
    Route::get('/',[DevolucaoController::class,'index'])->middleware(['auth'])->name('devolucoes.index');
    Route::get('/show/{id}',[DevolucaoController::class,'show'])->middleware(['auth'])->name('devolucoes.show');
    Route::get('/create',[DevolucaoController::class,'create'])->middleware(['auth'])->name('devolucoes.create');
    Route::post('/store',[DevolucaoController::class,'store'])->middleware(['auth'])->name('devolucoes.store');
    Route::get('/edit/{id}',[DevolucaoController::class,'edit'])->middleware(['auth'])->name('devolucoes.edit');
    Route::post('/update/{id}',[DevolucaoController::class,'update'])->middleware(['auth'])->name('devolucoes.update');
    Route::delete('/delete/{id}',[DevolucaoController::class,'destroy'])->middleware(['auth'])->name('devolucoes.delete');
});

Route::prefix('comodos')->group(Function () {
    Route::get('/index',[ComodoController::class,'index'])->middleware(['auth'])->name('comodos.index');
    Route::get('/create',[ComodoController::class,'create'])->middleware(['auth'])->name('comodos.create');
    Route::post('/store',[ComodoController::class,'store'])->middleware(['auth'])->name('comodos.store');
    Route::get('/show/{id}',[ComodoController::class,'show'])->middleware(['auth'])->name('comodos.show');
    Route::get('/edit/{id}',[ComodoController::class,'edit'])->middleware(['auth'])->name('comodos.edit');
    Route::put('/update/{id}',[ComodoController::class,'update'])->middleware(['auth'])->name('comodos.update');
    Route::delete('/{id}',[ComodoController::class,'destroy'])->middleware(['auth'])->name('comodos.delete');
});

Route::prefix('cedidos')->group(function () {
    Route::get('/index',[CedidoController::class,'index'])->middleware(['auth'])->name('cedidos.index');
    Route::get('/create',[CedidoController::class,'create'])->middleware(['auth'])->name('cedidos.create');
    Route::post('/store',[CedidoController::class,'store'])->middleware(['auth'])->name('cedidos.store');
    Route::get('/show/{id}',[CedidoController::class,'show'])->middleware(['auth'])->name('cedidos.show');
    Route::get('/edit/{id}',[CedidoController::class,'edit'])->middleware(['auth'])->name('cedidos.edit');
    Route::put('/update/{id}',[CedidoController::class,'update'])->middleware(['auth'])->name('cedidos.update');
    Route::delete('/{id}',[CedidoController::class,'destroy'])->middleware(['auth'])->name('cedidos.delete');
});

Route::prefix('categorias')->group(function () {
    Route::get('/', function () {return view('categorias.index');})->middleware(['auth'])->name('categorias.index');
    Route::get('/show/{id}', function () {return view('categorias.show'); })->middleware(['auth'])->name('categorias.show');
    // Route::get('/create',[UsuarioController::class,'create'])->middleware(['auth'])->name('categorias.create');
    // Route::post('/store',[UsuarioController::class,'store'])->middleware(['auth'])->name('categorias.store');
    // Route::get('/edit/{id}',[UsuarioController::class,'edit'])->middleware(['auth'])->name('categorias.edit');
    // Route::post('/update/{id}',[UsuarioController::class,'update'])->middleware(['auth'])->name('categorias.update');
    // Route::delete('/delete/{id}',[UsuarioController::class,'destroy'])->middleware(['auth'])->name('categorias.detroy');
});

require __DIR__.'/auth.php';
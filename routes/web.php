<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; 

use App\Http\Controllers\Baixa_PatrimonialController;
use App\Http\Controllers\BemexcedenteController;
use App\Http\Controllers\ComodoController;
use App\Http\Controllers\DesaparecidoController;
use App\Http\Controllers\DevolucaoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ItensdevolucaoController;
use App\Http\Controllers\ItensentradaController;
use App\Http\Controllers\ItenssaidaController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\Patrimonio_InservivelController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use GuzzleHttp\Middleware;

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

//Teste autenticação

Route::get('/teste', [App\Http\Controllers\UsuarioController::class, 'teste']);
Route::get('/teste/admin', [App\Http\Controllers\UsuarioController::class, 'testeAdmin'])->middleware('can:access');


Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::prefix('usuarios')->group(function () {
    Route::get('/index',[UsuarioController::class,'index'])->middleware(['auth'])->name('usuarios.index');
    Route::get('/create',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuarios.create');
    Route::post('/store',[UsuarioController::class,'store'])->middleware(['auth'])->name('usuarios.store');
    Route::get('/show/{id}',[UsuarioController::class,'show'])->middleware(['auth'])->name('usuarios.show');
    Route::get('/edit/{id}',[UsuarioController::class,'edit'])->middleware(['auth'])->name('usuarios.edit');
    Route::put('/update/{id}',[UsuarioController::class,'update'])->middleware(['auth'])->name('usuarios.update');
    Route::delete('/{id}',[UsuarioController::class,'destroy'])->middleware(['auth'])->name('usuarios.delete');
});

Route::prefix('entradas')->group(function () {
    Route::get('/index',[EntradaController::class,'index'])->middleware(['auth'])->name('entradas.index');
    Route::get('/create',[EntradaController::class,'create'])->middleware(['auth'])->name('entradas.create');
    Route::post('/store',[EntradaController::class,'store'])->middleware(['auth'])->name('entradas.store');
    Route::get('/show/{id}',[EntradaController::class,'show'])->middleware(['auth'])->name('entradas.show');
    Route::get('/edit/{id}',[EntradaController::class,'edit'])->middleware(['auth'])->name('entradas.edit');
    Route::put('/update/{id}',[EntradaController::class,'update'])->middleware(['auth'])->name('entradas.update');
    Route::delete('/{id}',[EntradaController::class,'destroy'])->middleware(['auth'])->name('entradas.delete');
});

Route::prefix('itensentradas')->group(function () {
    Route::get('/index',[ItensentradaController::class,'index'])->middleware(['auth'])->name('itensentradas.index');
    Route::get('/create',[ItensentradaController::class,'create'])->middleware(['auth'])->name('itensentradas.create');
    Route::post('/store',[ItensentradaController::class,'store'])->middleware(['auth'])->name('itensentradas.store');
    Route::get('/show/{id}',[ItensentradaController::class,'show'])->middleware(['auth'])->name('itensentradas.show');
    Route::get('/edit/{id}',[ItensentradaController::class,'edit'])->middleware(['auth'])->name('itensentradas.edit');
    Route::put('/update/{id}',[ItensentradaController::class,'update'])->middleware(['auth'])->name('itensentradas.update');
    Route::delete('/{id}',[ItensentradaController::class,'destroy'])->middleware(['auth'])->name('itensentradas.delete');
});

Route::prefix('patrimonios')->group(function () {
    Route::get('/index',[PatrimonioController::class,'index'])->middleware(['auth'])->name('patrimonios.index');
    Route::get('/create',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonios.create');
    Route::post('/store',[PatrimonioController::class,'store'])->middleware(['auth'])->name('patrimonios.store');
    Route::get('/show/{id}',[PatrimonioController::class,'show'])->middleware(['auth'])->name('patrimonios.show');
    Route::get('/edit/{id}',[PatrimonioController::class,'edit'])->middleware(['auth'])->name('patrimonios.edit');
    Route::put('/update/{id}',[PatrimonioController::class,'update'])->middleware(['auth'])->name('patrimonios.update');
    Route::delete('/{id}',[PatrimonioController::class,'destroy'])->middleware(['auth'])->name('patrimonios.delete');
});
    
Route::prefix('setores')->group(function () {
    Route::get('/index',[SetorController::class,'index'])->middleware(['auth'])->name('setores.index');
    Route::get('/create',[SetorController::class,'create'])->middleware(['auth'])->name('setores.create');
    Route::post('/store',[SetorController::class,'store'])->middleware(['auth'])->name('setores.store');
    Route::get('/show/{id}',[SetorController::class,'show'])->middleware(['auth'])->name('setores.show');
    Route::get('/edit/{id}',[SetorController::class,'edit'])->middleware(['auth'])->name('setores.edit');
    Route::put('/update/{id}',[SetorController::class,'update'])->middleware(['auth'])->name('setores.update');
    Route::delete('/{id}',[SetorController::class,'destroy'])->middleware(['auth'])->name('setores.delete');
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

Route::prefix('reservas')->group(function () {
    Route::get('/index',[ReservaController::class,'index'])->middleware(['auth'])->name('reservas.index');
    Route::get('/create',[ReservaController::class,'create'])->middleware(['auth'])->name('reservas.create');
    Route::post('/store',[ReservaController::class,'store'])->middleware(['auth'])->name('reservas.store');
    Route::get('/show/{id}',[ReservaController::class,'show'])->middleware(['auth'])->name('reservas.show');
    Route::get('/edit/{id}',[ReservaController::class,'edit'])->middleware(['auth'])->name('reservas.edit');
    Route::put('/update/{id}',[ReservaController::class,'update'])->middleware(['auth'])->name('reservas.update');
    Route::delete('/{id}',[ReservaController::class,'destroy'])->middleware(['auth'])->name('reservas.delete');
});

Route::prefix('bensexcedentes')->group(function () {
    Route::get('/index',[BemexcedenteController::class,'index'])->middleware(['auth'])->name('bensexcedentes.index');
    Route::get('/create',[BemexcedenteController::class,'create'])->middleware(['auth'])->name('bensexcedentes.create');
    Route::post('/store',[BemexcedenteController::class,'store'])->middleware(['auth'])->name('bensexcedentes.store');
    Route::get('/show/{id}',[BemexcedenteController::class,'show'])->middleware(['auth'])->name('bensexcedentes.show');
    Route::get('/edit/{id}',[BemexcedenteController::class,'edit'])->middleware(['auth'])->name('bensexcedentes.edit');
    Route::put('/update/{id}',[BemexcedenteController::class,'update'])->middleware(['auth'])->name('bensexcedentes.update');
    Route::delete('/{id}',[BemexcedenteController::class,'destroy'])->middleware(['auth'])->name('bensexcedentes.delete');
});

Route::prefix('desaparecidos')->group(function () {
    Route::get('/index',[DesaparecidoController::class,'index'])->middleware(['auth'])->name('desaparecidos.index');
    Route::get('/create',[DesaparecidoController::class,'create'])->middleware(['auth'])->name('desaparecidos.create');
    Route::post('/store',[DesaparecidoController::class,'store'])->middleware(['auth'])->name('desaparecidos.store');
    Route::get('/show/{id}',[DesaparecidoController::class,'show'])->middleware(['auth'])->name('desaparecidos.show');
    Route::get('/edit/{id}',[DesaparecidoController::class,'edit'])->middleware(['auth'])->name('desaparecidos.edit');
    Route::put('/update/{id}',[DesaparecidoController::class,'update'])->middleware(['auth'])->name('desaparecidos.update');
    Route::delete('/{id}',[DesaparecidoController::class,'destroy'])->middleware(['auth'])->name('desaparecidos.delete');
});

Route::prefix('patrimonios_inserviveis')->group(function () {
    Route::get('/index',[Patrimonio_InservivelController::class,'index'])->middleware(['auth'])->name('patrimonios_inserviveis.index');
    Route::get('/create',[Patrimonio_InservivelController::class,'create'])->middleware(['auth'])->name('patrimonios_inserviveis.create');
    Route::get('/show/{id}',[Patrimonio_InservivelController::class,'show'])->middleware(['auth'])->name('patrimonios_inserviveis.show');
    Route::post('/store',[Patrimonio_InservivelController::class,'store'])->middleware(['auth'])->name('patrimonios_inserviveis.store');
    Route::get('/edit/{id}',[Patrimonio_InservivelController::class,'edit'])->middleware(['auth'])->name('patrimonios_inserviveis.edit');
    Route::put('/update/{id}',[Patrimonio_InservivelController::class,'update'])->middleware(['auth'])->name('patrimonios_inserviveis.update');
    Route::delete('/{id}',[Patrimonio_InservivelController::class,'destroy'])->middleware(['auth'])->name('patrimonios_inserviveis.delete');
});   

Route::prefix('baixas_patrimoniais')->group(function () {
    Route::get('/index',[Baixa_PatrimonialController::class,'index'])->middleware(['auth'])->name('baixas_patrimoniais.index');
    Route::get('/create',[Baixa_PatrimonialController::class,'create'])->middleware(['auth'])->name('baixas_patrimoniais.create');
    Route::post('/store',[Baixa_PatrimonialController::class,'store'])->middleware(['auth'])->name('baixas_patrimoniais.store');
    Route::get('/show/{id}',[Baixa_PatrimonialController::class,'show'])->middleware(['auth'])->name('baixas_patrimoniais.show');
    Route::get('/edit/{id}',[Baixa_PatrimonialController::class,'edit'])->middleware(['auth'])->name('baixas_patrimoniais.edit');
    Route::put('/update/{id}',[Baixa_PatrimonialController::class,'update'])->middleware(['auth'])->name('baixas_patrimoniais.update');
    Route::delete('/{id}',[Baixa_PatrimonialController::class,'destroy'])->middleware(['auth'])->name('baixas_patrimoniais.delete');
});

Route::prefix('itenssaidas')->group(function () {
    Route::get('/index',[ItenssaidaController::class,'index'])->middleware(['auth'])->name('itenssaidas.index');
    Route::get('/create',[ItenssaidaController::class,'create'])->middleware(['auth'])->name('itenssaidas.create');
    Route::post('/store',[ItenssaidaController::class,'store'])->middleware(['auth'])->name('itenssaidas.store');
    Route::get('/show/{id}',[ItenssaidaController::class,'show'])->middleware(['auth'])->name('itenssaidas.show');    
    Route::get('/edit/{id}',[ItenssaidaController::class,'edit'])->middleware(['auth'])->name('itenssaidas.edit');
    Route::put('/update/{id}',[ItenssaidaController::class,'update'])->middleware(['auth'])->name('itenssaidas.update');
    Route::delete('/{id}',[ItenssaidaController::class,'destroy'])->middleware(['auth'])->name('itenssaidas.delete');
});

Route::prefix('saidas')->group(function () {
    Route::get('/index',[SaidaController::class,'index'])->middleware(['auth'])->name('saidas.index');
    Route::get('/create',[SaidaController::class,'create'])->middleware(['auth'])->name('saidas.create');
    Route::post('/store',[SaidaController::class,'store'])->middleware(['auth'])->name('saidas.store');
    Route::get('/show/{id}',[SaidaController::class,'show'])->middleware(['auth'])->name('saidas.show');    
    Route::get('/edit/{id}',[SaidaController::class,'edit'])->middleware(['auth'])->name('saidas.edit');
    Route::put('/update/{id}',[SaidaController::class,'update'])->middleware(['auth'])->name('saidas.update');
    Route::delete('/{id}',[SaidaController::class,'destroy'])->middleware(['auth'])->name('saidas.delete');
});

Route::prefix('emprestimos')->group(function () {
    Route::get('/index',[EmprestimoController::class,'index'])->middleware(['auth'])->name('emprestimos.index');
    Route::get('/create',[EmprestimoController::class,'create'])->middleware(['auth'])->name('emprestimos.create');
    Route::post('/store',[EmprestimoController::class,'store'])->middleware(['auth'])->name('emprestimos.store');
    Route::get('/show/{id}',[EmprestimoController::class,'show'])->middleware(['auth'])->name('emprestimos.show');
    Route::get('/edit/{id}',[EmprestimoController::class,'edit'])->middleware(['auth'])->name('emprestimos.edit');
    Route::put('/update/{id}',[EmprestimoController::class,'update'])->middleware(['auth'])->name('emprestimos.update');
    Route::delete('/{id}',[EmprestimoController::class,'destroy'])->middleware(['auth'])->name('emprestimos.delete');
});

Route::prefix('manutencaos')->group(function () {
    Route::get('/index',[ManutencaoController::class,'index'])->middleware(['auth'])->name('manutencaos.index');
    Route::get('/create',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencaos.create');
    Route::post('/store',[ManutencaoController::class,'store'])->middleware(['auth'])->name('manutencaos.store');    
    Route::get('/show/{id}',[ManutencaoController::class,'show'])->middleware(['auth'])->name('manutencaos.show');    
    Route::get('/edit/{id}',[ManutencaoController::class,'edit'])->middleware(['auth'])->name('manutencaos.edit');
    Route::put('/update/{id}',[ManutencaoController::class,'update'])->middleware(['auth'])->name('manutencaos.update');
    Route::delete('/{id}',[ManutencaoController::class,'destroy'])->middleware(['auth'])->name('manutencaos.delete');
});

Route::prefix('itensdevolucaos')->group(function () {
    Route::get('/index',[ItensdevolucaoController::class,'index'])->middleware(['auth'])->name('itensdevolucaos.index');
    Route::get('/create',[ItensdevolucaoController::class,'create'])->middleware(['auth'])->name('itensdevolucaos.create');
    Route::post('/store',[ItensdevolucaoController::class,'store'])->middleware(['auth'])->name('itensdevolucaos.store');
    Route::get('/show/{id}',[ItensdevolucaoController::class,'show'])->middleware(['auth'])->name('itensdevolucaos.show');
    Route::get('/edit/{id}',[ItensdevolucaoController::class,'edit'])->middleware(['auth'])->name('itensdevolucaos.edit');
    Route::put('/update/{id}',[ItensdevolucaoController::class,'update'])->middleware(['auth'])->name('itensdevolucaos.update');
    Route::delete('/{id}',[ItensdevolucaoController::class,'destroy'])->middleware(['auth'])->name('itensdevolucaos.delete');
});

Route::prefix('devolucaos')->group(function () {
    Route::get('/index',[DevolucaoController::class,'index'])->middleware(['auth'])->name('devolucaos.index');
    Route::get('/create',[DevolucaoController::class,'create'])->middleware(['auth'])->name('devolucaos.create');
    Route::post('/store',[DevolucaoController::class,'store'])->middleware(['auth'])->name('devolucaos.store');
    Route::get('/show/{id}',[DevolucaoController::class,'show'])->middleware(['auth'])->name('devolucaos.show');
    Route::get('/edit/{id}',[DevolucaoController::class,'edit'])->middleware(['auth'])->name('devolucaos.edit');
    Route::put('/update/{id}',[DevolucaoController::class,'update'])->middleware(['auth'])->name('devolucaos.update');
    Route::delete('/{id}',[DevolucaoController::class,'destroy'])->middleware(['auth'])->name('devolucaos.delete');
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
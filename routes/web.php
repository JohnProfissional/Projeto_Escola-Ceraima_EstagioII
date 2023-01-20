<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; 
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PrevisaoEntregarController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\TesteController;

use App\Http\Controllers\Baixa_PatrimonialController;
use App\Http\Controllers\BemexcedenteController;
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


Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::prefix('usuarios')->group(function () {
Route::get('/index',[UsuarioController::class,'index'])->middleware(['auth'])->name('usuarios.index');
Route::post('/create',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuarios.create');
Route::get('/create/usuarios',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuarios.create');
Route::post('/store',[UsuarioController::class,'store'])->middleware(['auth'])->name('usuarios.store');
Route::get('/usuarios', [UsuarioController::class, 'show']);
Route::post('/edit/{id}',[UsuarioController::class,'edit'])->middleware(['auth'])->name('usuarios.edit');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->middleware(['auth'])->name('usuarios.delete');
});

Route::prefix('entradas')->group(function () {
Route::get('/index',[EntradaController::class,'index'])->middleware(['auth'])->name('entradas.index');
Route::post('/create',[EntradaController::class,'create'])->middleware(['auth'])->name('entradas.create');
Route::get('/create/entradas',[EntradaController::class,'create'])->middleware(['auth'])->name('entradas.create');
Route::post('/store',[EntradaController::class,'store'])->middleware(['auth'])->name('entradas.store');
Route::get('/entradas', [EntradaController::class, 'show']);
Route::post('/edit/{id}',[EntradaController::class,'edit'])->middleware(['auth'])->name('entradas.edit');
Route::delete('/entradas/{id}',[EntradaController::class, 'destroy'])->middleware(['auth'])->name('entradas.delete');
});

Route::prefix('itensentradas')->group(function () {
Route::get('/index',[ItensentradaController::class,'index'])->middleware(['auth'])->name('itensentradas.index');
Route::post('/create',[ItensentradaController::class,'create'])->middleware(['auth'])->name('itensentradas.create');
Route::get('/create/itensentradas',[ItensentradaController::class,'create'])->middleware(['auth'])->name('itensentradas.create');
Route::post('/store',[ItensentradaController::class,'store'])->middleware(['auth'])->name('itensentradas.store');
Route::get('/itensentradas', [ItensentradaController::class, 'show']);
Route::post('/edit/{id}',[ItensentradaController::class,'edit'])->middleware(['auth'])->name('itensentradas.edit');
Route::delete('/itensentradas/{id}',[ItensentradaController::class, 'destroy'])->middleware(['auth'])->name('itensentradas.delete');
});

Route::prefix('setores')->group(function () {
Route::get('/index',[SetorController::class,'index'])->middleware(['auth'])->name('setores.index');
Route::post('/create',[SetorController::class,'create'])->middleware(['auth'])->name('setores.create');
Route::get('/create/setores',[SetorController::class,'create'])->middleware(['auth'])->name('setores.create');
Route::post('/store',[SetorController::class,'store'])->middleware(['auth'])->name('setores.store');
Route::get('/setores', [SetorController::class, 'show']);
Route::post('/edit/{id}',[SetorController::class,'edit'])->middleware(['auth'])->name('setores.edit');
Route::delete('/setores/{id}',[SetorController::class, 'destroy'])->middleware(['auth'])->name('setores.delete');
});

Route::prefix('saidas')->group(function () {
Route::get('/index',[SaidaController::class,'index'])->middleware(['auth'])->name('saidas.index');
Route::post('/create',[SaidaController::class,'create'])->middleware(['auth'])->name('saidas.create');
Route::get('/create/saidas',[SaidaController::class,'create'])->middleware(['auth'])->name('saidas.create');
Route::post('/store',[SaidaController::class,'store'])->middleware(['auth'])->name('saidas.store');
Route::get('/saidas', [SaidaController::class, 'show']);
Route::post('/edit/{id}',[SaidaController::class,'edit'])->middleware(['auth'])->name('saidas.edit');
Route::delete('/saidas/{id}',[SaidaController::class, 'destroy'])->middleware(['auth'])->name('saidas.delete');
});

Route::prefix('itenssaidas')->group(function () {
Route::get('/index',[ItenssaidaController::class,'index'])->middleware(['auth'])->name('itenssaidas.index');
Route::post('/create',[ItenssaidaController::class,'create'])->middleware(['auth'])->name('itenssaidas.create');
Route::get('/create/itenssaidas',[ItenssaidaController::class,'create'])->middleware(['auth'])->name('itenssaidas.create');
Route::post('/store',[ItenssaidaController::class,'store'])->middleware(['auth'])->name('itenssaidas.store');
Route::get('/itenssaidas', [ItenssaidaController::class, 'show']);
Route::post('/edit/{id}',[ItenssaidaController::class,'edit'])->middleware(['auth'])->name('itenssaidas.edit');
Route::delete('/itenssaidas/{id}',[ItenssaidaController::class, 'destroy'])->middleware(['auth'])->name('itenssaidas.delete');
});
  
Route::prefix('reservas')->group(function () {
Route::get('/index',[ReservaController::class,'index'])->middleware(['auth'])->name('reservas.index');
Route::post('/create',[ReservaController::class,'create'])->middleware(['auth'])->name('reservas.create');
Route::get('/create/reservas',[ReservaController::class,'create'])->middleware(['auth'])->name('reservas.create');
Route::post('/store',[ReservaController::class,'store'])->middleware(['auth'])->name('reservas.store');
Route::get('/reservas', [ReservaController::class, 'show']);
Route::post('/edit/{id}',[ReservaController::class,'edit'])->middleware(['auth'])->name('reservas.edit');
Route::delete('/reservas/{id}',[ReservaController::class, 'destroy'])->middleware(['auth'])->name('reservas.delete');
});

Route::prefix('patrimonios')->group(function () {
Route::get('/index',[PatrimonioController::class,'index'])->middleware(['auth'])->name('patrimonios.index');
Route::post('/create',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonios.create');
Route::get('/create/patrimonios',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonios.create');
Route::post('/store',[PatrimonioController::class,'store'])->middleware(['auth'])->name('patrimonios.store');
Route::get('/patrimonios', [PatrimonioController::class, 'show']);
Route::post('/edit/{id}',[PatrimonioController::class,'edit'])->middleware(['auth'])->name('patrimonios.edit');
Route::delete('/patrimonios/{id}',[PatrimonioController::class, 'destroy'])->middleware(['auth'])->name('patrimonios.delete');
});

Route::prefix('patrimoniosinserviveis')->group(function () {
Route::get('/index',[Patrimonio_InservivelController::class,'index'])->middleware(['auth'])->name('patrimoniosinserviveis.index');
Route::post('/create',[Patrimonio_InservivelController::class,'create'])->middleware(['auth'])->name('patrimoniosinserviveis.create');
Route::get('/create/patrimoniosinserviveis',[Patrimonio_InservivelController::class,'create'])->middleware(['auth'])->name('patrimoniosinserviveis.create');
Route::post('/store',[Patrimonio_InservivelController::class,'store'])->middleware(['auth'])->name('patrimoniosinserviveis.store');
Route::get('/patrimoniosinserviveis', [Patrimonio_InservivelController::class, 'show']);
Route::post('/edit/{id}',[Patrimonio_InservivelController::class,'edit'])->middleware(['auth'])->name('patrimoniosinserviveis.edit');
Route::delete('/patrimoniosinserviveis/{id}',[Patrimonio_InservivelController::class, 'destroy'])->middleware(['auth'])->name('patrimoniosinserviveis.delete');
});

Route::prefix('manutencaos')->group(function () {
Route::get('/index',[ManutencaoController::class,'index'])->middleware(['auth'])->name('manutencaos.index');
Route::post('/create',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencaos.create');
Route::get('/create/manutencaos',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencaos.create');
Route::post('/store',[ManutencaoController::class,'store'])->middleware(['auth'])->name('manutencaos.store');
Route::get('/manutencaos', [ManutencaoController::class, 'show']);
Route::post('/edit/{id}',[ManutencaoController::class,'edit'])->middleware(['auth'])->name('manutencaos.edit');
Route::delete('/manutencaos/{id}',[ManutencaoController::class, 'destroy'])->middleware(['auth'])->name('manutencaos.delete');
});



Route::get('/index/sala',[SalaController::class,'index'])->middleware(['auth'])->name('sala.index');

Route::post('/create/sala',[SalaController::class,'create'])->middleware(['auth'])->name('sala.create');

Route::get('/create/sala',[SalaController::class,'create'])->middleware(['auth'])->name('sala.create');

Route::post('/storesala',[SalaController::class,'store'])->middleware(['auth'])->name('sala.store');

Route::post('/sala/edit/{id}',[SalaController::class,'edit'])->middleware(['auth'])->name('sala.edit');
Route::put('/sala/edit/{id}',[SalaController::class,'edit'])->middleware(['auth'])->name('sala.edit');
Route::delete('/sala/{id}',[SalaController::class, 'destroy'])->middleware(['auth'])->name('sala.delete');




Route::get('/index/testes',[TesteController::class,'index'])->middleware(['auth'])->name('testes.index');

Route::post('/create/testes',[TesteController::class,'create'])->middleware(['auth'])->name('testes.create');

Route::get('/create/testes',[TesteController::class,'create'])->middleware(['auth'])->name('testes.create');

Route::post('/storetestes',[TesteController::class,'store'])->middleware(['auth'])->name('testes.store');

Route::post('/testes/edit/{id}',[TesteController::class,'edit'])->middleware(['auth'])->name('testes.edit');
Route::delete('/testes/{id}',[TesteController::class, 'destroy'])->middleware(['auth'])->name('teste.delete');






Route::get('/index/reservas',[ReservaController::class,'index'])->middleware(['auth'])->name('reservas.index');

Route::post('/create/reservas',[ReservaController::class,'create'])->middleware(['auth'])->name('testes.reservas');

Route::get('/create/reservas',[ReservaController::class,'create'])->middleware(['auth'])->name('reservas.create');

Route::post('/storereservas',[ReservaController::class,'store'])->middleware(['auth'])->name('reservas.store');

Route::post('/reservas/edit/{id}',[ReservaController::class,'edit'])->middleware(['auth'])->name('reservas.edit');
Route::delete('/reservas/{id}',[ReservaController::class, 'destroy'])->middleware(['auth'])->name('reserva.delete');







Route::get('/index/previsaoentregar',[PrevisaoEntregarController::class,'index'])->middleware(['auth'])->name('previsaoentregar.index');

Route::post('/create/previsaoentregar',[PrevisaoEntregarController::class,'create'])->middleware(['auth'])->name('previsaoentregar.reservas');

Route::get('/create/previsaoentregar',[PrevisaoEntregarController::class,'create'])->middleware(['auth'])->name('previsaoentregar.create');

Route::post('/storeprevisaoentregar',[PrevisaoEntregarController::class,'store'])->middleware(['auth'])->name('previsaoentregar.store');

Route::post('/previsaoentregar/edit/{id}',[PrevisaoEntregarController::class,'edit'])->middleware(['auth'])->name('previsaoentregar.edit');

Route::delete('/previsaoentregar/{id}',[PrevisaoEntregarController::class, 'destroy'])->middleware(['auth'])->name('previsaoentregar.delete');





Route::get('/index/patrimonio',[PatrimonioController::class,'index'])->middleware(['auth'])->name('patrimonio.index');
Route::post('/index/patrimonio',[PatrimonioController::class,'index'])->middleware(['auth'])->name('patrimonio.index');

Route::post('/create/patrimonio',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonio.reservas');

Route::get('/create/patrimonio',[PatrimonioController::class,'create'])->middleware(['auth'])->name('patrimonio.create');

Route::post('/storepatrimonio',[PatrimonioController::class,'store'])->middleware(['auth'])->name('patrimonio.store');

Route::post('/patrimonio/edit/{id}',[PatrimonioController::class,'edit'])->middleware(['auth'])->name('patrimonio.edit');
Route::put('/patrimonio/edit/{id}',[PatrimonioController::class,'edit'])->middleware(['auth'])->name('patrimonio.edit');
Route::put('/patrimonio/update/{id}',[PatrimonioController::class, 'update'])->name('patrimonio.update');
Route::delete('/patrimonio/{id}',[PatrimonioController::class, 'destroy'])->middleware(['auth'])->name('patrimonio.delete');






Route::get('/index/manutencao',[ManutencaoController::class,'index'])->middleware(['auth'])->name('manutencao.index');

Route::post('/create/manutencao',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencao.reservas');

Route::get('/create/manutencao',[ManutencaoController::class,'create'])->middleware(['auth'])->name('manutencao.create');

Route::post('/storemanutencao',[ManutencaoController::class,'store'])->middleware(['auth'])->name('manutencao.store');

Route::post('/manutencao/edit/{id}',[ManutencaoController::class,'edit'])->middleware(['auth'])->name('manutencao.edit');
Route::delete('/manutencao/{id}',[ManutencaoController::class, 'destroy'])->middleware(['auth'])->name('manutencao.delete');








Route::get('/index/evento',[EventoController::class,'index'])->middleware(['auth'])->name('evento.index');

Route::post('/create/evento',[EventoController::class,'create'])->middleware(['auth'])->name('evento.create');

Route::get('/create/evento',[EventoController::class,'create'])->middleware(['auth'])->name('evento.create');

Route::post('/storeevento',[EventoController::class,'store'])->middleware(['auth'])->name('evento.store');
Route::get('/storeevento',[EventoController::class,'store'])->middleware(['auth'])->name('evento.store');


Route::post('/evento/edit/{id}',[EventoController::class,'edit'])->middleware(['auth'])->name('evento.edit');

Route::put('/evento/edit/{id}',[EventoController::class,'edit'])->middleware(['auth'])->name('evento.edit');

Route::delete('/evento/{id}',[EventoController::class, 'destroy'])->middleware(['auth'])->name('evento.delete');

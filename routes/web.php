<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; 
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\PrevisaoEntregarController;
use App\Http\Controllers\ReservaController;

use App\Http\Controllers\SalaController;
use App\Http\Controllers\TesteController;


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





Route::get('/index/usuarios',[UsuarioController::class,'index'])->middleware(['auth'])->name('usuario.index');

Route::post('/create/usuarios',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuario.create');

Route::get('/create/usuarios',[UsuarioController::class,'create'])->middleware(['auth'])->name('usuario.create');

Route::post('/storeusuarios',[UsuarioController::class,'store'])->middleware(['auth'])->name('usuario.store');

Route::post('/usuarios/edit/{id}',[UsuarioController::class,'edit'])->middleware(['auth'])->name('usuario.edit');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->middleware(['auth'])->name('usuario.delete');



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

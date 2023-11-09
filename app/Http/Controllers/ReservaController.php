<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(){
        $reservas = Reserva::all();
        return view('reservas.index', ['reservas'=>$reservas]);
    }   

    public function show($id){
        if($id){
            $reserva = Reserva::where('id', $id)->get();
        } else {
            $reserva = Reserva::all();
        }
        return view('reservas.show', ['reservas'=>$reserva]);
    }
    
    public function create(){
        return view('reservas.create');
    }

    public function store(Request $request){
        $reserva = new Reserva();
        $reserva->solicitante = $request->solicitante;
        $reserva->cargo = $request->cargo;
        $reserva->patrimonio = $request->patrimonio;
        $reserva->codigodopatrimonio = $request->codigodopatrimonio;
        $reserva->datainicioreserva = $request->datainicioreserva;
        $reserva->datafimreserva = $request->datafimreserva;
        $reserva->quantidadeitensreservados = $request->quantidadeitensreservados;
        $reserva->patrimonio_id = $request->patrimonio_id;
        $reserva->emprestimo_id = $request->emprestimo_id;
        $reserva->save();
        return redirect()->route('reservas.index');
    }

    public function edit($id){
        $Reserva = Reserva::findorFail($id);
        return view('reservas.edit',['Reserva'=>$Reserva]);
    }

    public function update(Request $request){
        Reserva::find($request->id)->update($request->except('_token_'));
        return redirect()->route('reservas.index')->with('msg', 'Alteraçãorealizada com sucesso');
    }

    public function destroy($id){
        Reserva::findorFail($id)->delete();
        return redirect()->route('reservas.index')->with('msg', 'Reserva apagada');
    }

}

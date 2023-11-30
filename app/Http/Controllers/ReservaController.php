<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Reserva;
use App\Models\Usuario;
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
        $usuarios = Usuario::all();
        $patrimonios = Patrimonio::all();
        return view('reservas.create', ['patrimonios'=>$patrimonios, 'usuarios'=>$usuarios]); 
    }
    
    public function store(Request $request){
        $reserva = new Reserva();        
        $reserva->datareserva = $request->datareserva;        
        $reserva->quantidadeitensreservados = $request->quantidadeitensreservados;
        $reserva->usuario_id = $request->usuario_id;
        $reserva->patrimonio_id = $request->patrimonio_id;        
        $reserva->save();
        return redirect()->route('reservas.index'); 
    }

    public function edit($id){
        $Reserva = Reserva::findorFail($id);
        $usuarios = Usuario::all();
        $patrimonios = Patrimonio::all();
        return view('reservas.edit',['Reserva'=>$Reserva, 'usuarios'=>$usuarios, 'patrimonios'=>$patrimonios]);
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

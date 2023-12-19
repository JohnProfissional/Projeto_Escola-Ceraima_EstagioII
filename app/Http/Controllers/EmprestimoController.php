<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Patrimonio;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(){
        $emprestimos = Emprestimo::all();
        return view('emprestimos.index', ['emprestimos'=>$emprestimos]);
    }

    public function show($id){
        if($id){
            $emprestimo = Emprestimo::where('id', $id)->get();
        } else {
            $emprestimo = Emprestimo::all();
        }
        return view('emprestimos.show', ['emprestimos' => $emprestimo]);
    }

    public function create(){
        $usuarios = User::all();
        $reservas = Reserva::all();
        $patrimonios = Patrimonio::all();
        return view('emprestimos.create', ['patrimonios'=>$patrimonios, 'reservas'=>$reservas, 'usuarios'=>$usuarios]);
    }

    public function store(Request $request){
        $emprestimo = new Emprestimo();
        $emprestimo->quantidadeemprestada = $request->quantidadeemprestada;
        $emprestimo->dataemprestimo = $request->dataemprestimo;
        $emprestimo->usuario_id = $request->usuario_id;
        $emprestimo->reserva_id = $request->reserva_id;
        $emprestimo->patrimonio_id = $request->patrimonio_id;       
        $emprestimo->save();
        return redirect()->route('emprestimos.index'); 
    }

    public function edit($id){
        $Emprestimo = Emprestimo::findorFail($id);
        $usuarios = User::all();
        $reservas = Reserva::all();
        $patrimonios = Patrimonio::all();
        return view('emprestimos.edit',['Emprestimo'=>$Emprestimo, 'patrimonios'=>$patrimonios, 'reservas'=>$reservas, 'usuarios'=>$usuarios]);
    }

    public function update(Request $request){
        Emprestimo::find($request->id)->update($request->except('_token_'));
        return redirect()->route('emprestimos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Emprestimo::findorfail($id)->delete();
        return redirect()->route('emprestimos.index')->with('msg', 'Empréstimo apagado');
    }

}

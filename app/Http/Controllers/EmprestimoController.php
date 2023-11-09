<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
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
        return view('emprestimos.create');
    }

    public function store(Request $request){
        $emprestimo = new Emprestimo();
        $emprestimo->nomedobememprestado = $request->nomedobememprestado;
        $emprestimo->coddobem = $request->coddobem;
        $emprestimo->nomedoprofissional = $request->nomedoprofissional;
        $emprestimo->quantidadeemprestada = $request->quantidadeemprestada;
        $emprestimo->saida_id = $request->saida_id;
        $emprestimo->save();
        return redirect()->route('emprestimos.index');
    }

    public function edit($id){
        $Emprestimo = Emprestimo::findorFail($id);
        return view('emprestimos.edit',['Emprestimo'=>$Emprestimo]);
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

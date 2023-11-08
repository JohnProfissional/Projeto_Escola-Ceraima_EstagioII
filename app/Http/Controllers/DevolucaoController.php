<?php

namespace App\Http\Controllers;

use App\Models\Devolucao;
use Illuminate\Http\Request;

class DevolucaoController extends Controller
{
    public function index(){
        $devolucoes = Devolucao::all();
        return view('devolucoes.index', ['devolucoes'=>$devolucoes]);
    }

    public function show($id){
        if($id){
            $devolucao = Devolucao::where('id', $id)->get();
        } else {
            $devolucao = Devolucao::all();
        }
        return view('devolucoes.show', ['devolucoes' => $devolucao]);
    }

    public function create(){
        return view('devolucoes.create');
    }

    public function store(Request $request){
        $devolucao = new Devolucao();
        $devolucao->datadadevolucao = $request->datadadevolucao;
        $devolucao->descricaodadevolucao = $request->descricaodadevolucao;
        $devolucao->saida_id = $request->saida_id;
        $devolucao->save();
        return redirect()->route('devolucoes.index');
    }

    public function edit($id){
        $Devolucao = Devolucao::findorFail($id);
        return view('devolucoes.edit',['Devolucao'=>$Devolucao]);
    }

    public function update(Request $request){
        Devolucao::find($request->id)->update($request->except('_token_'));
        return redirect()->route('devolucoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Devolucao::findorfail($id)->delete();
        return redirect()->route('devolucoes.index')->with('msg', 'Devolução apagada');
    }

}

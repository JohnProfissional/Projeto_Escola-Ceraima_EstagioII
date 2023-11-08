<?php

namespace App\Http\Controllers;

use App\Models\Itensdevolucao;
use Illuminate\Http\Request;

class ItensdevolucaoController extends Controller
{
    public function index(){
        $itensdevolucoes = Itensdevolucao::all();
        return view('itensdevolucoes.index', ['itensdevolucoes'=>$itensdevolucoes]);
    }

    public function show($id){
        if($id){
            $itemdevolucao = Itensdevolucao::where('id', $id)->get();
        } else {
            $itemdevolucao = Itensdevolucao::all();
        }
        return view('itensdevolucoes.show', ['itensdevolucoes'=>$itemdevolucao]);
    }

    public function create(){
        return view('itensdevolucoes.create');
    }

    public function store(Request $request){
        $itemdevolucao = new Itensdevolucao();
        $itemdevolucao->nomedobem = $request->nomedobem;
        $itemdevolucao->codigoidentificacaodobem = $request->codigoidentificacaodobem;
        $itemdevolucao->quantidadedevolvida = $request->quantidadedevolvida;
        $itemdevolucao->devolvedor = $request->devolvedor;
        $itemdevolucao->recebedor = $request->recebedor;
        $itemdevolucao->devolucao_id = $request->devolucao_id;
        $itemdevolucao->patrimonio_id = $request->patrimonio_id;
        $itemdevolucao->save();
        return redirect()->route('itensdevolucoes.index');
    }

    public function edit($id){
        $Itensdevolucao = Itensdevolucao::findorFail($id);
        return view('itensdevolucoes.edit',['Itensdevolucao'=>$Itensdevolucao]);
    }

    public function update(Request $request){
        Itensdevolucao::find($request->id)->update($request->except('_token_'));
        return redirect()->route('itensdevolucoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Itensdevolucao::findorfail($id)->delete();
        return redirect()->route('itensdevolucoes.index')->with('msg', 'Devolução de item apagada');
    }

}

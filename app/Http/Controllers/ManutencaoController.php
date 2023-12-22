<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Patrimonio;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index(){
        $manutencoes = Manutencao::all();
        return view('manutencoes.index', ['manutencoes'=>$manutencoes]);
    }

    public function show($id){
        if($id){
            $manutencao = Manutencao::where('id', $id)->get();
        } else {
            $manutencao = Manutencao::all();
        }
        return view('manutencoes.show', ['manutencoes'=>$manutencao]);
    }

    public function create(){
        $patrimonios = Patrimonio::where('status', 'Inservível')->get();
        return view('manutencoes.create', ['patrimonios'=>$patrimonios]);
    }

    public function store(Request $request){
        $manutencao = new Manutencao();
        $manutencao->empresa = $request->empresa;
        $manutencao->dataprevistadeentrega = $request->dataprevistadeentrega;
        $manutencao->totaldasaidadebens = $request->totaldasaidadebens;
        $manutencao->dataentrada = $request->dataentrada;
        $manutencao->datasaida = $request->datasaida;
        $manutencao->patrimonio_id = $request->patrimonio_id;
        $manutencao->save();
        return redirect()->route('manutencoes.index'); 
    }

    public function edit($id){
        $Manutencao = Manutencao::findorFail($id);
        $patrimonios = Patrimonio::all();
        return view('manutencoes.edit',['Manutencao'=>$Manutencao, 'patrimonios'=>$patrimonios]);
    }

    public function update(Request $request, $id){
        Manutencao::find($request->id)->update($request->except('_token_'));
        return redirect()->route('manutencoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Manutencao::findorfail($id)->delete();
        return redirect()->route('manutencoes.index')->with('msg','Manutenção apagada');
    }

}

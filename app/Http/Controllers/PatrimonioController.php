<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    public function index(){
        $patrimonios = Patrimonio::all();
        return view('patrimonios.index', ['patrimonios'=>$patrimonios]);
    }    

    public function show($id){
        if($id){
            $patrimonio = Patrimonio::where('id', $id)->get();
        } else {
            $patrimonio = Patrimonio::all();
        }
        return view('patrimonios.show', ['patrimonios' => $patrimonio]);
    }

    public function create(){
        return view('patrimonios.create');
    }

    public function store(Request $request){
        $patrimonio = new Patrimonio();
        $patrimonio->orgao = $request->orgao;
        $patrimonio->unidorcamentaria = $request->unidorcamentaria;
        $patrimonio->centrodecusto = $request->centrodecusto;
        $patrimonio->nomedopatrimonio = $request->nomedopatrimonio;
        $patrimonio->codigo = $request->codigo;
        $patrimonio->descricao = $request->descricao;
        $patrimonio->numeropatrimonio = $request->numeropatrimonio;
        $patrimonio->valor = $request->valor;
        $patrimonio->historico = $request->historico;
        $patrimonio->numeronotafiscal = $request->numeronotafiscal;        
        $patrimonio->datanotafiscal = $request->datanotafiscal;
        $patrimonio->valortotaldosbens = $request->valortotaldosbens;//aa
        $patrimonio->totaldebens = $request->totaldebens;//aa
        $patrimonio->dataaquisicao = $request->dataaquisicao;
        $patrimonio->setor_id = $request->setor_id;
        $patrimonio->save();
        return redirect()->route('patrimonios.index');
    }

    public function edit($id){
        $Patrimonio = Patrimonio::findorFail($id);
        return view('patrimonios.edit',['Patrimonio'=>$Patrimonio]);
    }

    public function update(Request $request){
        Patrimonio::find($request->id)->update($request->except('_token_'));
        return redirect()->route('patrimonios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Patrimonio::findorFail($id)->delete();
        return redirect()->route('patrimonios.index')->with('msg','Patrimônio apagado');
    }

}

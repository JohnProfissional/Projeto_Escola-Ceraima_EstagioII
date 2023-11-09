<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio_Inservivel;
use Illuminate\Http\Request;

class Patrimonio_InservivelController extends Controller
{
    public function index(){
        $patrimoniosinserviveis = Patrimonio_Inservivel::all();
        return view('patrimoniosinserviveis.index', ['patrimoniosinserviveis'=>$patrimoniosinserviveis]); //passa objeto
    } 

    public function show($id){
        if($id){
            $patrimonioinsersivel = Patrimonio_Inservivel::where('id', $id)->get();
        } else {
            $patrimonioinsersivel = Patrimonio_Inservivel::all();
        }
        return view('patrimoniosinserviveis.show', ['patrimoniosinserviveis' => $patrimonioinsersivel]);
    }

    public function create(){
        return view('patrimoniosinserviveis.create');
    }

    public function store(Request $request){
        $patrimonioinsersivel = new Patrimonio_Inservivel();
        $patrimonioinsersivel->iteminservivel = $request->iteminservivel;
        $patrimonioinsersivel->codigodediscricao = $request->codigodediscricao;
        $patrimonioinsersivel->quantidadetotaldeinserviveis = $request->quantidadetotaldeinserviveis;
        $patrimonioinsersivel->saida_id = $request->saida_id;
        $patrimonioinsersivel->baixa_patrimonial_id = $request->baixa_patrimonial_id;
        $patrimonioinsersivel->setor_id = $request->setor_id;
        $patrimonioinsersivel->save();
        return redirect()->route('patrimoniosinserviveis.index');
    }

    public function edit($id){
        $Patrimonio_Inservivel = Patrimonio_Inservivel::findorFail($id);
        return view('patrimoniosinserviveis.edit',['Patrimonio_Inservivel'=>$Patrimonio_Inservivel]);
    }

    public function update(Request $request){
        Patrimonio_Inservivel::find($request->id)->update($request->except('_token_'));
        return redirect()->route('patrimoniosinserviveis.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Patrimonio_Inservivel::findorfail($id)->delete();
        return redirect()->route('patrimoniosinserviveis.index')->with('msg','Patrimônio insersível apagado');
    }

}

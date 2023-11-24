<?php

namespace App\Http\Controllers;

use App\Models\Baixa_Patrimonial;
use Illuminate\Http\Request;

class Baixa_PatrimonialController extends Controller
{
    public function index(){
        $baixaspatrimoniais = Baixa_Patrimonial::all();
        return view('baixaspatrimoniais.index', ['baixaspatrimoniais'=>$baixaspatrimoniais]);
    }

    public function show($id){
        if($id){
            $baixapatrimonial = Baixa_Patrimonial::where('id', $id)->get();
        } else {
            $baixapatrimonial = Baixa_Patrimonial::all();
        }
        return view('baixaspatrimoniais.show', ['baixaspatrimoniais' => $baixapatrimonial]);
    }
    
    public function create(){
        return view('baixaspatrimoniais.create');
    }

    public function store(Request $request){
        $baixa_patrimonial = new Baixa_Patrimonial();
        $baixa_patrimonial->responsavelentregar = $request->responsavelentregar;
        $baixa_patrimonial->datadabaixa = $request->datadabaixa;
        $baixa_patrimonial->encarregadodaretirada = $request->encarregadodaretirada;
        $baixa_patrimonial->quantidaderetirada = $request->quantidaderetirada;
        $baixa_patrimonial->patrimonio_id = $request->patrimonio_id;        
        $baixa_patrimonial->save();
        return redirect()-> route('baixas_patrimoniais.index');
    }

    public function edit($id){
        $Baixa_Patrimonial = Baixa_Patrimonial::findorFail($id);
        return view('baixaspatrimoniais.edit',['Baixa_Patrimonial'=>$Baixa_Patrimonial]);
    }

    public function update(Request $request){
        Baixa_Patrimonial::find($request->id)->update($request->except('_token_'));
        return redirect()->route('baixas_patrimoniais.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Baixa_Patrimonial::findorfail($id)->delete();
        return redirect()->route('baixas_patrimoniais.index')->with('msg', 'Baixa patrimonial apagada com sucesso');
    }

}

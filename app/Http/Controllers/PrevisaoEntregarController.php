<?php

namespace App\Http\Controllers;
use App\Models\PrevisaoEntregar;
use App\Models\Manutencao;



use Illuminate\Http\Request;

class PrevisaoEntregarController extends Controller
{
    //

    public function create(){
        $PrevisaoEntregar = PrevisaoEntregar::get();
        $Manutencao = Manutencao::get();
        return view('previsao_entregar.create',compact('PrevisaoEntregar','Manutencao'));
    }

    public function edit($id){
        $PrevisaoEntregar = PrevisaoEntregar::findorFail($id);
        return view('previsao_entregar.edit',['PrevisaoEntregar'=>$PrevisaoEntregar]);
    }

    public function update(Request $request){
        PrevisaoEntregar::find($request->id)->update($request->except('_token'));
        return redirect('previsao_entregar/index')->with('msg', 'alteração realizado com sucesso');
        
    }

    public function index(){
        $PrevisaoEntregar=PrevisaoEntregar::all();
        return view('previsao_entregar.index',compact('PrevisaoEntregar'));
    }

    public function destroy($id){
        $PrevisaoEntregar=PrevisaoEntregar::findOrFail($id);
        $PrevisaoEntregar->delete();
        return view('previsao_entregar.index');
    }

    public function store(Request $request){

            $PrevisaoEntregar = new PrevisaoEntregar();
            $PrevisaoEntregar->data_previsao_entrega=$request->data_previsao_entrega;
            $PrevisaoEntregar->manutencao_id=$request->manutencao_id;
            $PrevisaoEntregar->save();
    }
}

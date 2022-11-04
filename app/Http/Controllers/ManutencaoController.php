<?php

namespace App\Http\Controllers;
use App\Models\Manutencao;
use App\Models\patrimonio;


use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    //

    public function create(){
        $Manutencao = Manutencao::get();
        $Patrimonio = patrimonio::get();
        return view('manutencao.create',compact('Manutencao','Patrimonio'));
    }

    public function edit($id){
        $Manutencao = Manutencao::findorFail($id);
        return view('manutencao.edit',['Manutencao'=>$Manutencao]);
    }

    public function update(Request $request){
        Manutencao::find($request->id)->update($request->except('_token'));
        return redirect('manutencao.index')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Manutencao=Manutencao::all();
        return view('manutencao.index',compact('Manutencao'));
    }

    public function destroy($id){
        $Manutencao=Manutencao::findOrFail($id);
        $Manutencao->delete();
        return view('manutencao.index');
    }

    public function store(Request $request){

            $Manutencao = new Manutencao();
            $Manutencao->data_manutencao=$request->data_manutencao;
            $Manutencao->patrimonio_id=$request->patrimonio_id;            
            $Manutencao->save();
    }
}

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
        $patrimonio->entrada_id = $request->entrada_id;
        $patrimonio->comodo_id = $request->comodo_id;
        $patrimonio->descricaodopatrimonio = $request->descricaodopatrimonio;
        $patrimonio->tombo = $request->tombo;
        $patrimonio->valordobem = $request->valordobem;
        $patrimonio->historicodatransferencia = $request->historicodatransferencia;
        $patrimonio->dataaquisicao = $request->dataaquisicao;
        $patrimonio->status = $request->status;
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

<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index(){
        $setores = Setor::all();
        return view('setores.index', ['setores'=>$setores]);
    }    

    public function show($id){
        if($id){
            $setor = Setor::where('id', $id)->get();
        } else {
            $setor = Setor::all();
        }
        return view('setores.show', ['setores' => $setor]);
    }

    public function create(){
        return view('setores.create');
    }

    public function store(Request $request){
        $setor = new Setor();
        $setor->descricaodosetor = $request->descricaodosetor;
        $setor->nomebem = $request->nomebem;
        $setor->numerodebem = $request->numerodebem;
        $setor->quantidadedebem = $request->naquantidadedebemme;
        $setor->saida_id = $request->saida_id;
        $setor->save();
        return redirect()->route('setores.index');
    }

    public function edit($id){
        $Setor = Setor::findorFail($id);
        return view('setores.edit',['Setor'=>$Setor]);
    }

    public function update(Request $request){
        Setor::find($request->id)->update($request->except('_token_'));
        return redirect()->route('setores.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Setor::findorFail($id)->delete();
        return redirect()->route('setores.index')->with('msg','Setor apagado');
    }

}

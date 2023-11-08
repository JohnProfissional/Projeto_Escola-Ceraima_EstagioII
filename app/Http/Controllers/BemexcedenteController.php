<?php

namespace App\Http\Controllers;

use App\Models\Bemexcedente;
use Illuminate\Http\Request;

class BemexcedenteController extends Controller
{
    public function index(){
        $bensexcedentes = Bemexcedente::all();
        return view('bensexcedentes.index', ['bensexcedentes'=>$bensexcedentes]);
    }

    public function show($id){
        if($id){
            $bensexcedentes = Bemexcedente::where('id', $id)->get();
        } else {
            $bensexcedentes = Bemexcedente::all();
        }
        return view('bensexcedentes.show', ['bensexcedentes' => $bensexcedentes]);
    }

    public function create(){
        return view('bensexcedentes.create');
    }   

    public function store(Request $request){
        $bemexcedente = new Bemexcedente();
        $bemexcedente->descricaodoexcedente = $request->descricaodoexcedente;
        $bemexcedente->observacoes = $request->observacoes;
        $bemexcedente->quantidadeexcedente = $request->quantidadeexcedente;
        $bemexcedente->usuario_id = $request->usuario_id;
        $bemexcedente->save();
        return redirect()-> route('bensexcedentes.index');
    }
    
    public function edit($id){
        $Bemexcedente = Bemexcedente::findorFail($id);
        return view('bensexcedentes.edit',['Bemexcedente'=>$Bemexcedente]);
    }

    public function update(Request $request){
        Bemexcedente::find($request->id)->update($request->except('_token_'));
        return redirect()->route('bensexcedentes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Bemexcedente::findorFail($id)->delete();
        return redirect()->route('bensexcedentes.index')->with('msg','Bem excedente apagado');
    }

}

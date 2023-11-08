<?php

namespace App\Http\Controllers;

use App\Models\Itenssaida;
use Illuminate\Http\Request;

class ItenssaidaController extends Controller
{
    public function index(){
        $itenssaidas = Itenssaida::all();
        return view('itenssaidas.index', ['itenssaidas'=>$itenssaidas]); 
    }

    public function show($id){
        if($id){
            $itemsaida = Itenssaida::where('id', $id)->get();
        } else {
            $itemsaida = Itenssaida::all();
        }
        return view('itenssaidas.show', ['itenssaidas'=>$itemsaida]);
    }

    public function create(){
        return view('itenssaidas.create');
    }

    public function store(Request $request){
        $itemsaida = new Itenssaida();
        $itemsaida->descricaodopatrimonio = $request->descricaodopatrimonio;
        $itemsaida->codigopatrimonio = $request->codigopatrimonio;
        $itemsaida->quantidadesaida = $request->quantidadesaida;
        $itemsaida->saida_id = $request->saida_id;
        $itemsaida->patrimonio_id = $request->patrimonio_id;
        $itemsaida->save();
        return redirect()->route('itenssaidas.index');
    }

    public function edit($id){
        $Itenssaida = Itenssaida::findorFail($id);
        return view('itenssaidas.edit',['Itenssaida'=>$Itenssaida]);
    }

    public function update(Request $request){
        Itenssaida::find($request->id)->update($request->except('_token_'));
        return redirect()->route('itenssaidas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Itenssaida::findorfail($id)->delete();
        return redirect()->route('itenssaidas.index')->with('msg','Saída de item apagada');
    }

}

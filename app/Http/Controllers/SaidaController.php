<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function index(){
        $saidas = Saida::all();
        return view('saidas.index', ['saidas'=>$saidas]);
    }    

    public function show($id){
        if($id){
            $saida = Saida::where('id', $id)->get();
        } else {
            $saida = Saida::all();
        }
        return view('saidas.show', ['saidas' => $saida]);
    }

    public function create(){
        return view('saidas.create');
    }

    public function store(Request $request){
        $saida = new Saida();
        $saida->datasaida = $request->datasaida;
        $saida->statussaida = $request->statussaida;
        $saida->quantidadetotalsaida = $request->quantidadetotalsaida;
        $saida->usuario_id = $request->usuario_id;
        $saida->save();
        return redirect()->route('saidas.index');
    }

    public function edit($id){
        $Saida = Saida::findorFail($id);
        return view('saidas.edit',['Saida'=>$Saida]);
    }

    public function update(Request $request){
        Saida::find($request->id)->update($request->except('_token_'));
        return redirect()->route('saidas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Saida::findorFail($id)->delete();
        return redirect()->route('saidas.index')->with('msg','Saída apagada');
    }

}

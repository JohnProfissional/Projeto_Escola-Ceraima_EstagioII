<?php

namespace App\Http\Controllers;

// use App\Models\Itensdevolucao;
use App\Models\Itensentrada;
use Illuminate\Http\Request;

class ItensentradaController extends Controller
{
    public function index(){
        $itensentradas = Itensentrada::all();
        return view('itensentradas.index', ['itensentradas'=>$itensentradas]);
    }

    public function show($id){
        if($id){
            $itementrada = Itensentrada::where('id', $id)->get();
        } else {
            $itementrada = Itensentrada::all();
        }
        return view('itensentradas.show', ['itensentradas'=>$itementrada]);
    }

    public function create(){
        return view('itensentradas.create');
    }

    public function store(Request $request){
        $itementrada = new Itensentrada();
        $itementrada->codbem = $request->codbem;
        $itementrada->descricaodobem = $request->descricaodobem;
        $itementrada->tombo = $request->tombo;
        $itementrada->valordobem = $request->valordobem;
        $itementrada->historicodatransferencia = $request->historicodatransferencia;
        $itementrada->numerodanotafiscal = $request->numerodanotafiscal;
        $itementrada->datadanotafiscal = $request->datadanotafiscal;
        $itementrada->quantidade = $request->quantidade;
        $itementrada->entrada_id = $request->entrada_id;
        $itementrada->patrimonio_id = $request->patrimonio_id;
        $itementrada->save();
        return redirect()->route('itensentradas.index');
    }

    public function edit($id){
        $Itensentrada = Itensentrada::findorFail($id);
        return view('itensentradas.edit',['Itensentrada'=>$Itensentrada]);
    }

    public function update(Request $request){
        Itensentrada::find($request->id)->update($request->except('_token_'));
        return redirect()->route('itensentradas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Itensentrada::findorfail($id)->delete();
        return redirect()->route('itensentradas.index')->with('msg','Entrada de item apagada');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Comodo;
use App\Models\Patrimonio;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(){
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas'=>$entradas]);
    }

    // public function show($id){
    //     if($id){
    //         $entrada = Entrada::where('id', $id)->get();
    //     } else {
    //         $entrada = Entrada::all();
    //     }
    //     return view('entradas.show', ['entradas' => $entrada]);
    // }

    public function show($id) {
        if($id){
            $entrada = Entrada::find($id);
            $patrimonios = Patrimonio::where('entrada_id', $entrada->id)->get();
    
            if(!$entrada) {
                return redirect()->route('entradas.index')->with('error', 'Entrada não encontrada');
            }
        } else {
            $entrada = Entrada::all();
            $patrimonios = Patrimonio::all();
        }
        return view('entradas.show', ['entradas' => $entrada, 'patrimonios' => $patrimonios]);
    }

    public function create(){
        $comodos = Comodo::all();
        return view('entradas.create', ['comodos' => $comodos]);
    }

    public function store(Request $request){
        $entrada = new Entrada();
        $entrada->datadatransferencia = $request->datadatransferencia;
        $entrada->unidadeanterior = $request->unidadeanterior;
        $entrada->centrodecustoanterior = $request->centrodecustoanterior;
        $entrada->novaunidade = $request->novaunidade;
        $entrada->centrodecustodestino = $request->centrodecustodestino;
        $entrada->valortotaldosbens = $request->valortotaldosbens;
        $entrada->numerodanotafiscal = $request->numerodanotafiscal;
        $entrada->datadanotafiscal = $request->datadanotafiscal;
        $entrada->orgao = $request->orgao;
        $entrada->unidadeorcamentaria = $request->unidadeorcamentaria;
        $entrada->totaldebens = $request->totaldebens;
        $entrada->save();
        return redirect()->route('entradas.index');
    }

    public function edit($id){
        $Entrada = Entrada::findorFail($id);
        return view('entradas.edit',['Entrada'=>$Entrada]);
    }

    public function update(Request $request){
        Entrada::find($request->id)->update($request->except('_token_'));
        return redirect()->route('entradas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Entrada::findorfail($id)->delete();
        return redirect()->route('entradas.index')->with('msg', 'Entrada apagada');
    }

}

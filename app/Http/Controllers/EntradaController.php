<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(){
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas'=>$entradas]);
    }

    public function show($id){
        if($id){
            $entrada = Entrada::where('id', $id)->get();
        } else {
            $entrada = Entrada::all();
        }
        return view('entradas.show', ['entradas' => $entrada]);
    }

    public function create(){
        return view('entradas.create');
    }

    public function store(Request $request){
        $entrada = new Entrada();
        $entrada->datadatransferencia = $request->datadatransferencia;
        $entrada->unidadeanterior = $request->unidadeanterior;
        $entrada->centrodecustoanterior = $request->centrodecustoanterior;
        $entrada->novaunidade = $request->novaunidade;
        $entrada->centrodecustodestino = $request->centrodecustodestino;
        $entrada->usuario_id = $request->usuario_id;
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

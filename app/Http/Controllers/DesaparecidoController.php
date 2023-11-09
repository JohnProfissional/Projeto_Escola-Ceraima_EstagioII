<?php

namespace App\Http\Controllers;

use App\Models\Desaparecido;
use Illuminate\Http\Request;

class DesaparecidoController extends Controller
{
    public function index(){
        $desaparecidos = Desaparecido::all();
        return view('desaparecidos.index', ['desaparecidos'=>$desaparecidos]);
    }

    public function show($id){
        if($id){
            $desaparecido = Desaparecido::where('id', $id)->get();
        } else {
            $desaparecido = Desaparecido::all();
        }
        return view('desaparecidos.show', ['desaparecidos' => $desaparecido]);
    }

    public function create(){
        return view('desaparecidos.create');
    }

    public function store(Request $request){
        $desaparecido = new Desaparecido();
        $desaparecido->descricaoitem = $request->descricaoitem;
        $desaparecido->numeroitem = $request->numeroitem;
        $desaparecido->quantidadesumida = $request->quantidadesumida;
        $desaparecido->patrimonio_id = $request->patrimonio_id;
        $desaparecido->save();
        return redirect()->route('desaparecidos.index');
    }

    public function edit($id){
        $Desaparecido = Desaparecido::findorFail($id);
        return view('desaparecidos.edit',['Desaparecido'=>$Desaparecido]);
    }

    public function update(Request $request){
        Desaparecido::find($request->id)->update($request->except('_token_'));
        return redirect()->route('desaparecidos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Desaparecido::findorfail($id)->delete();
        return redirect()->route('desaparecidos.index')->with('msg', 'Patrimônio desaparecido apagado');
    }

}

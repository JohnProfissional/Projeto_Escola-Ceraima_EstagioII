<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodo;

class ComodoController extends Controller
{

    public function index(){
        $comodos = Comodo::all();
        return view('comodos.index', ['comodos'=>$comodos]);
    }

    public function show($id){
        if($id){
            $comodo = Comodo::where('id', $id)->get();
        } else {
            $comodo = Comodo::all();
        }
        return view('comodos.show', ['comodos'=>$comodo]);
    }

    public function create(){
        return view('comodos.create');
    }

    public function store(Request $request){
        $comodo = new Comodo();
        $comodo->identificacaodocomodo = $request->identificacaodocomodo;
        $comodo->identificacaodobem = $request->identificacaodobem;
        $comodo->numerodobem = $request->numerodobem;
        $comodo->quantidadedobem = $request->quantidadedobem;
        $comodo->setor_id = $request->setor_id;
        $comodo->save();
        return redirect()->route('comodos.index');
    }

    public function edit($id){
        $Comodo = Comodo::findorFail($id);
        return view('comodos.edit',['Comodo'=>$Comodo]);
    }

    public function update(Request $request, $id){
        Comodo::find($request->id)->update($request->except('_token_'));
        return redirect()->route('comodos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Comodo::findorfail($id)->delete();
        return redirect()->route('comodos.index')->with('msg','Cômodo apagado');
    }

}

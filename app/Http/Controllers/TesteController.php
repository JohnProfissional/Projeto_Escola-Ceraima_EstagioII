<?php

namespace App\Http\Controllers;
use App\Models\Teste;
use App\Models\patrimonio;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //

    public function create(){
        $Teste = Teste::get();
        $Patrimonio = Patrimonio::get();
        return view('patrimonio.create',compact('Teste','Patrimonio'));
    }

    public function edit($id){
        $Teste = Teste::findorFail($id);
        return view('teste.edit',['Teste'=>$Teste]);
    }

    public function update(Request $request){
        Teste::find($request->id)->update($request->except('_token'));
        return redirect('index/teste')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Teste=Teste::all();
        return view('teste.index',compact('Teste'));
    }

    public function destroy($id){
        $Teste=Teste::findOrFail($id);
        $Teste->delete();
        return view('teste.index');
    }

    public function store(Request $request){

            $Teste = new Teste();
            $Teste->data_teste=$request->data_teste;
            $Teste->status=$request->status;
            $Teste->patrimonio_id=$request->patrimonio_id;
            $Teste->save();
    }
}

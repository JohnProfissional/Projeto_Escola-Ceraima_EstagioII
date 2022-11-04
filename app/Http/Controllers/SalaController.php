<?php

namespace App\Http\Controllers;
use App\Models\Sala;




use Illuminate\Http\Request;

class SalaController extends Controller
{
    //

    public function create(){
        $Sala = Sala::get();
        return view('sala.create',compact('Sala'));
    }

    public function edit($id){
        $Sala = Sala::findorFail($id);
        return view('sala.edit',['Sala'=>$Sala]);
    }

    public function update(Request $request){
        Sala::find($request->id)->update($request->except('_token'));
        return redirect('index/sala')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Sala=Sala::all();
        return view('sala.index',compact('Sala'));
    }

    public function destroy($id){
        $Sala=Sala::findOrFail($id);
        $Sala->delete();
        return view('sala.index');
    }

    public function store(Request $request){

            $Sala = new Sala();
            $Sala->nome=$request->nome;
            
            $Sala->save();
    }
}

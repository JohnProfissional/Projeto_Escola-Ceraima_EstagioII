<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Http\Requests\StoreProdutoRequest;


use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function create(){
        $Usuario = Usuario::get();
        return view('usuario.create',compact('Usuario'));
    }

    public function edit($id){
        $Usuario = Usuario::findorFail($id);
        return view('usuario.edit',['Usuario'=>$Usuario]);
    }

    public function update(Request $request){
        Usuario::find($request->id)->update($request->except('_token'));
        return redirect('usuarios.index')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Usuario=Usuario::all();
        return view('usuario.index',compact('Usuario'));
    }

    public function destroy($id){
        $Usuario=Usuario::findOrFail($id);
        $Usuario->delete();
        return view('Produto.index');
    }

    public function store(Request $request){

            $Usuario = new Usuario();
            $Usuario->nome=$request->nome;
           
            $Usuario->save();
    }
}

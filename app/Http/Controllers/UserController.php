<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index(){
        $usuarios = User::all();
        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }

    public function show($id){
        if($id){
            $usuario = User::where('id', $id)->get();
        } else {
            $usuario = User::all();
        }
        return view('usuarios.show', ['usuarios' => $usuario]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->cpf = $request->cpf;
        $usuario->cargo = $request->cargo;
        $usuario->email = $request->email;
        $usuario->senha = $request->senha;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    public function edit($id){
        $Usuario = User::findorFail($id);
        return view('usuarios.edit',['Usuario'=>$Usuario]);
    }

    public function update(Request $request){
        User::find($request->id)->update($request->except('_token_'));
        return redirect()->route('usuarios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        User::findorfail($id)->delete();
        return redirect()->route('usuarios.index')->with('msg','Usuário apagado');
    }

}

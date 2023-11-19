<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index(){
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }

    public function show($id){
        if($id){
            $usuario = Usuario::where('id', $id)->get();
        } else {
            $usuario = Usuario::all();
        }
        return view('usuarios.show', ['usuarios' => $usuario]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        $usuario = new Usuario();
        $usuario->nomeusuario = $request->nomeusuario;
        $usuario->cargo = $request->cargo;
        $usuario->email = $request->email;
        $usuario->senha = $request->senha;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    public function edit($id){
        $Usuario = Usuario::findorFail($id);
        return view('usuarios.edit',['Usuario'=>$Usuario]);
    }

    public function update(Request $request){
        Usuario::find($request->id)->update($request->except('_token_'));
        return redirect()->route('usuarios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Usuario::findorfail($id)->delete();
        return redirect()->route('usuarios.index')->with('msg','Usuário apagado');
    }

}

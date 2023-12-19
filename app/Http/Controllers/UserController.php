<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'cargo' => 'required',
            'access_level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        $usuario = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'cargo' => $request->cargo,
            'access_level' => $request->access_level,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

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

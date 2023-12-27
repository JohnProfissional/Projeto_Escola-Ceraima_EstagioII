<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('selectCampoDeBusca');

        if ($filtro === 'user') {
            $usuarios = User::where('access_level', 'user')->get();
        } elseif ($filtro === 'admin') {
            $usuarios = User::where('access_level', 'admin')->get();
        } else {
            $usuarios = User::all();
        }

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $usuarios = User::query();

        if ($searchTerm) {
            $usuarios->where('name', 'like', '%' . $searchTerm . '%');
        }

        $usuarios = $usuarios->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        if ($id) {
            $usuario = User::where('id', $id)->get();
        } else {
            $usuario = User::all();
        }
        return view('usuarios.show', ['usuarios' => $usuario]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

    public function edit($id)
    {
        $Usuario = User::findorFail($id);
        return view('usuarios.edit', ['Usuario' => $Usuario]);
    }

    public function update(Request $request)
    {
        $usuario = User::find($request->id);
    
        $validator = Validator::make($request->all(), [
            'cpf' => ['required', Rule::unique('users')->ignore($usuario->id),] , 'email' => [ 'required', Rule::unique('users')->ignore($usuario->id),] ,]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::find($request->id)->update($request->except('_token_'));
        return redirect()->route('usuarios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            User::findorfail($id)->delete();
            return redirect()->route('usuarios.index')->with('msg', 'Usuário apagado');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este usuário não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o usuário.');
            }
        }
    }
}

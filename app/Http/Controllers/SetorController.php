<?php

namespace App\Http\Controllers;

use App\Models\Comodo;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', ['setores' => $setores]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $setores = Setor::query();

        if ($searchTerm) {
            $setores->where('descricaodosetor', 'like', '%' . $searchTerm . '%');
        }

        $setores = $setores->get();

        return view('setores.index', compact('setores'));
    }

    public function show($id)
    {
        if ($id) {
            $setores = Setor::find($id);
            $comodos = Comodo::where('setor_id', $setores->id)->get();

            if (!$setores) {
                return redirect()->route('setores.index')->with('error', 'Setor não encontrado');
            }
        } else {
            $setores = Setor::all();
            $comodos = Comodo::all();
        }
        return view('setores.show', ['setores' => $setores, 'comodos' => $comodos]);
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $setor = new Setor();
        $setor->descricaodosetor = $request->descricaodosetor;
        $setor->quantidadedecomodos = $request->quantidadedecomodos;
        $setor->save();
        return redirect()->route('setores.index');
    }

    public function edit($id)
    {
        $Setor = Setor::findorFail($id);
        return view('setores.edit', ['Setor' => $Setor]);
    }

    public function update(Request $request)
    {
        Setor::find($request->id)->update($request->except('_token_'));
        return redirect()->route('setores.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Setor::findorFail($id)->delete();
            return redirect()->route('setores.index')->with('msg', 'Setor apagado');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este setor não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o setor.');
            }
        }
    }
}

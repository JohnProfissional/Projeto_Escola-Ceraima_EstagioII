<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodo;
use App\Models\Setor;
use Illuminate\Database\QueryException;

class ComodoController extends Controller
{

    public function index()
    {
        $comodos = Comodo::all();
        return view('comodos.index', ['comodos' => $comodos]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $comodos = Comodo::query();

        if ($searchTerm) {
            $comodos->where('descricaodocomodo', 'like', '%' . $searchTerm . '%');
        }

        $comodos = $comodos->get();

        return view('comodos.index', compact('comodos'));
    }

    public function show($id)
    {
        if ($id) {
            $comodo = Comodo::where('id', $id)->get();
        } else {
            $comodo = Comodo::all();
        }
        return view('comodos.show', ['comodos' => $comodo]);
    }

    public function create()
    {
        $setores = Setor::all();
        return view('comodos.create', ['setores' => $setores]);
    }

    public function store(Request $request)
    {
        $comodo = new Comodo();
        $comodo->descricaodocomodo = $request->descricaodocomodo;
        $comodo->quantidadedebens = $request->quantidadedebens; //Acho q pode até tirar esse campo
        $comodo->setor_id = $request->setor_id;
        $comodo->save();
        return redirect()->route('comodos.index');
    }

    public function edit($id)
    {
        $Comodo = Comodo::findorFail($id);
        $setores = Setor::all();
        return view('comodos.edit', ['Comodo' => $Comodo, 'setores' => $setores]);
    }

    public function update(Request $request, $id)
    {
        Comodo::find($request->id)->update($request->except('_token_'));
        return redirect()->route('comodos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Comodo::findorfail($id)->delete();
            return redirect()->route('comodos.index')->with('msg', 'Cômodo apagado');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este cômodo não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o cômodo.');
            }
        }
    }
}

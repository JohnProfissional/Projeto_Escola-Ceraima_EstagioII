<?php

namespace App\Http\Controllers;

use App\Models\Bemexcedente;
use App\Models\Comodo;
use Illuminate\Http\Request;

class BemexcedenteController extends Controller
{
    public function index()
    {
        $bensexcedentes = Bemexcedente::all();
        return view('bensexcedentes.index', ['bensexcedentes' => $bensexcedentes]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $bensexcedentes = Bemexcedente::query();

        if ($searchTerm) {
            $bensexcedentes->where('descricao', 'like', '%' . $searchTerm . '%');
        }

        $bensexcedentes = $bensexcedentes->get();

        return view('bensexcedentes.index', compact('bensexcedentes'));
    }

    public function show($id)
    {
        if ($id) {
            $bensexcedentes = Bemexcedente::where('id', $id)->get();
        } else {
            $bensexcedentes = Bemexcedente::all();
        }
        return view('bensexcedentes.show', ['bensexcedentes' => $bensexcedentes]);
    }

    public function create()
    {
        $comodos = Comodo::all();
        return view('bensexcedentes.create', ['comodos' => $comodos]);
    }

    public function store(Request $request)
    {
        $bemexcedente = new Bemexcedente();
        $bemexcedente->descricao = $request->descricao;
        $bemexcedente->observacoes = $request->observacoes;
        $bemexcedente->quantidadeexcedente = $request->quantidadeexcedente;
        $bemexcedente->comodo_id = $request->comodo_id;
        $bemexcedente->save();
        return redirect()->route('bensexcedentes.index');
    }

    public function edit($id)
    {
        $Bemexcedente = Bemexcedente::findorFail($id);
        $comodos = Comodo::all();
        return view('bensexcedentes.edit', ['Bemexcedente' => $Bemexcedente, 'comodos' => $comodos]);
    }

    public function update(Request $request)
    {
        Bemexcedente::find($request->id)->update($request->except('_token_'));
        return redirect()->route('bensexcedentes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        Bemexcedente::findorFail($id)->delete();
        return redirect()->route('bensexcedentes.index')->with('msg', 'Bem excedente apagado');
    }
}

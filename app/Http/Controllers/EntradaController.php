<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Comodo;
use App\Models\Patrimonio;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas' => $entradas]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $entradas = Entrada::query();

        if ($searchTerm) {
            $entradas->whereDate('datadatransferencia', $searchTerm);
        }

        $entradas = $entradas->get();

        return view('entradas.index', compact('entradas'));
    }

    public function show($id)
    {
        if ($id) {
            $entradas = Entrada::find($id);
            $patrimonios = Patrimonio::where('entrada_id', $entradas->id)->get();

            if (!$entradas) {
                return redirect()->route('entradas.index')->with('error', 'Entrada não encontrada');
            }
        } else {
            $entradas = Entrada::all();
            $patrimonios = Patrimonio::all();
        }
        return view('entradas.show', ['entradas' => $entradas, 'patrimonios' => $patrimonios]);
    }

    public function create()
    {
        $comodos = Comodo::all();
        return view('entradas.create', ['comodos' => $comodos]);
    }

    public function store(Request $request)
    {
        $entrada = new Entrada();
        $entrada->datadatransferencia = $request->datadatransferencia;
        $entrada->unidadeanterior = $request->unidadeanterior;
        $entrada->centrodecustoanterior = $request->centrodecustoanterior;
        $entrada->novaunidade = $request->novaunidade;
        $entrada->centrodecustodestino = $request->centrodecustodestino;
        $entrada->valortotaldosbens = $request->valortotaldosbens;
        $entrada->numerodanotafiscal = $request->numerodanotafiscal;
        $entrada->datadanotafiscal = $request->datadanotafiscal;
        $entrada->orgao = $request->orgao;
        $entrada->unidadeorcamentaria = $request->unidadeorcamentaria;
        $entrada->totaldebens = $request->totaldebens;
        $entrada->save();
        return redirect()->route('entradas.index');
    }

    public function edit($id)
    {
        $Entrada = Entrada::findorFail($id);
        return view('entradas.edit', ['Entrada' => $Entrada]);
    }

    public function update(Request $request)
    {
        Entrada::find($request->id)->update($request->except('_token_'));
        return redirect()->route('entradas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Entrada::findorfail($id)->delete();
            return redirect()->route('entradas.index')->with('msg', 'Entrada apagada');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta entrada não pode ser excluída pois está sendo utilizada em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a entrada.');
            }
        }
    }
}

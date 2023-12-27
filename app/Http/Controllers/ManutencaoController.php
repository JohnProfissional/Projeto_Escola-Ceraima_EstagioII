<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Patrimonio;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManutencaoController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('selectCampoDeBusca');
    
        if ($filtro === 'andamento') {
            $manutencoes = Manutencao::whereNull('datasaida')->get();
        } elseif ($filtro === 'concluido') {
            $manutencoes = Manutencao::whereNotNull('datasaida')->get();
        } else {
            $manutencoes = Manutencao::all();
        }
    
        return view('manutencoes.index', ['manutencoes' => $manutencoes]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');

        $manutencoes = Manutencao::query();

        if ($searchTerm) {
            $manutencoes->where('empresa', 'like', '%' . $searchTerm . '%');
        }

        $manutencoes = $manutencoes->get();

        return view('manutencoes.index', compact('manutencoes'));
    }

    public function show($id)
    {
        if ($id) {
            $manutencao = Manutencao::where('id', $id)->get();
        } else {
            $manutencao = Manutencao::all();
        }
        return view('manutencoes.show', ['manutencoes' => $manutencao]);
    }

    public function create()
    {
        $patrimonios = Patrimonio::where('status', 'Inservível')->get();
        return view('manutencoes.create', ['patrimonios' => $patrimonios]);
    }

    public function store(Request $request)
    {
        $manutencao = new Manutencao();
        $manutencao->empresa = $request->empresa;
        $manutencao->dataprevistadeentrega = $request->dataprevistadeentrega;
        $manutencao->totaldasaidadebens = $request->totaldasaidadebens;
        $manutencao->dataentrada = $request->dataentrada;
        $manutencao->patrimonio_id = $request->patrimonio_id;

        // Se a data de saída não for fornecida, seta para null
        if (!$request->has('datasaida')) {
            $manutencao->datasaida = null;
        } else {
            $manutencao->datasaida = $request->datasaida;
        }

        $manutencao->save();

        // Atualiza o status do patrimônio para "em manutenção"
        $patrimonio = Patrimonio::find($request->patrimonio_id);
        if ($patrimonio) {
            $patrimonio->status = 'Em manutenção';
            $patrimonio->save();
        }

        return redirect()->route('manutencoes.index');
    }

    public function edit($id)
    {
        $Manutencao = Manutencao::findorFail($id);
        $patrimonios = Patrimonio::all();
        return view('manutencoes.edit', ['Manutencao' => $Manutencao, 'patrimonios' => $patrimonios]);
    }

    public function update(Request $request, $id)
    {
        Manutencao::find($request->id)->update($request->except('_token_'));
        return redirect()->route('manutencoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        Manutencao::findorfail($id)->delete();
        return redirect()->route('manutencoes.index')->with('msg', 'Manutenção apagada');
    }

    public function recebido($id)
    {
        // Define a data de saída como a data atual
        $manutencao = Manutencao::findOrFail($id);
        $manutencao->datasaida = Carbon::now()->toDateString();
        $manutencao->save();

        // Atualiza o status do patrimônio para "Servível"
        $patrimonio = Patrimonio::findOrFail($manutencao->patrimonio_id);
        $patrimonio->status = 'servivel';
        $patrimonio->save();

        return redirect()->route('manutencoes.index')->with('success', 'Manutenção recebida com sucesso!');
    }
}

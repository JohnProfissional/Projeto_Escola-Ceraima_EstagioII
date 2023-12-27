<?php

namespace App\Http\Controllers;

use App\Models\Baixa_Patrimonial;
use App\Models\Patrimonio;
use Illuminate\Http\Request;

class Baixa_PatrimonialController extends Controller
{
    public function index()
    {
        $baixaspatrimoniais = Baixa_Patrimonial::all();
        return view('baixaspatrimoniais.index', ['baixaspatrimoniais' => $baixaspatrimoniais]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $baixaspatrimoniais = Baixa_Patrimonial::query();
    
        if ($searchTerm) {
            $baixaspatrimoniais->whereDate('datadabaixa', $searchTerm);
        }
    
        $baixaspatrimoniais = $baixaspatrimoniais->get();
    
        return view('baixaspatrimoniais.index', compact('baixaspatrimoniais'));
    }
    

    public function show($id)
    {
        if ($id) {
            $baixapatrimonial = Baixa_Patrimonial::where('id', $id)->get();
        } else {
            $baixapatrimonial = Baixa_Patrimonial::all();
        }
        return view('baixaspatrimoniais.show', ['baixaspatrimoniais' => $baixapatrimonial]);
    }

    public function create($id)
    {
        $patrimonio = Patrimonio::findorFail($id);
        return view('baixaspatrimoniais.create', ['patrimonio' => $patrimonio]);
    }

    public function store(Request $request)
    {
        $baixa_patrimonial = new Baixa_Patrimonial();
        $baixa_patrimonial->responsavelentregar = $request->responsavelentregar;
        $baixa_patrimonial->datadabaixa = $request->datadabaixa;
        $baixa_patrimonial->encarregadodaretirada = $request->encarregadodaretirada;
        $baixa_patrimonial->quantidaderetirada = $request->quantidaderetirada;
        $baixa_patrimonial->patrimonio_id = $request->patrimonio_id;
        $baixa_patrimonial->save();

        // Atualiza o status do patrimônio para "baixa patrimonial"
        $patrimonio = Patrimonio::find($request->patrimonio_id);
        if ($patrimonio) {
            $patrimonio->status = 'Baixa patrimonial';
            $patrimonio->save();
        }

        return redirect()->route('baixas_patrimoniais.index');
    }

    public function edit($id)
    {
        $Baixa_Patrimonial = Baixa_Patrimonial::findorFail($id);
        $patrimonios = Patrimonio::all();
        return view('baixaspatrimoniais.edit', ['Baixa_Patrimonial' => $Baixa_Patrimonial, 'patrimonios' => $patrimonios]);
    }

    public function update(Request $request)
    {
        Baixa_Patrimonial::find($request->id)->update($request->except('_token_'));
        return redirect()->route('baixas_patrimoniais.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        Baixa_Patrimonial::findorfail($id)->delete();
        return redirect()->route('baixas_patrimoniais.index')->with('msg', 'Baixa patrimonial apagada com sucesso');
    }
}

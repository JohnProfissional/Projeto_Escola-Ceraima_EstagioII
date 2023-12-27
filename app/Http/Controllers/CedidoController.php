<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedido;
use App\Models\Patrimonio;

class CedidoController extends Controller
{
    public function index()
    {
        $cedidos = Cedido::all();
        return view('cedidos.index', ['cedidos' => $cedidos]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm1 = $request->input('searchInstituicao');
        $searchTerm2 = $request->input('searchDate');

        $cedidos = Cedido::query();

        if ($searchTerm1) {
            $cedidos->where('instituicaoreceptora', 'like', '%' . $searchTerm1 . '%');
        } elseif ($searchTerm2) {
            $cedidos->whereDate('datacedido', $searchTerm2);
        }

        $cedidos = $cedidos->get();

        return view('cedidos.index', compact('cedidos'));
    }

    public function show($id)
    {
        if ($id) {
            $cedido = Cedido::where('id', $id)->get();
        } else {
            $cedido = Cedido::all();
        }
        return view('cedidos.show', ['cedidos' => $cedido]);
    }

    public function create()
    {
        $patrimonios = Patrimonio::where('status', 'servivel')->get();
        return view('cedidos.create', ['patrimonios' => $patrimonios]);
    }

    public function store(Request $request)
    {
        $cedido = new Cedido();
        $cedido->instituicaoreceptora = $request->instituicaoreceptora;
        $cedido->datacedido = $request->datacedido;
        $cedido->qtd = $request->qtd;
        $cedido->patrimonio_id = $request->patrimonio_id;

        $cedido->save();

        $patrimonio = Patrimonio::find($request->patrimonio_id);
        if ($patrimonio) {
            $patrimonio->status = 'Cedido';
            $patrimonio->save();
        }

        return redirect()->route('cedidos.index');
    }

    public function edit($id)
    {
        $Cedido = Cedido::findorFail($id);
        $patrimonios = Patrimonio::where('status', 'Servível')->get();
        return view('cedidos.edit', ['Cedido' => $Cedido, 'patrimonios' => $patrimonios]);
    }

    public function update(Request $request, $id)
    {
        Cedido::find($request->id)->update($request->except('_token_'));
        return redirect()->route('cedidos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        Cedido::findorfail($id)->delete();
        return redirect()->route('cedidos.index')->with('msg', 'Patrimônio cedido apagado');
    }
}

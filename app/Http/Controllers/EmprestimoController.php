<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Patrimonio;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::all();
        return view('emprestimos.index', ['emprestimos' => $emprestimos]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm1 = $request->input('searchUser');
        $searchTerm2 = $request->input('searchDate');

        $emprestimos = Emprestimo::query();

        if ($searchTerm1) {
            $emprestimos->join('users', 'emprestimos.usuario_id', '=', 'users.id')->where('users.name', 'like', '%' . $searchTerm1 . '%');
        } elseif ($searchTerm2) {
            $emprestimos->whereDate('dataemprestimo', $searchTerm2);
        }

        $emprestimos = $emprestimos->get();

        return view('emprestimos.index', compact('emprestimos'));
    }

    public function show($id)
    {
        if ($id) {
            $emprestimo = Emprestimo::where('id', $id)->get();
        } else {
            $emprestimo = Emprestimo::all();
        }
        return view('emprestimos.show', ['emprestimos' => $emprestimo]);
    }

    public function create()
    {
        $usuarios = Auth::user();
        $reservas = Reserva::all();
        $patrimonios = Patrimonio::where('status', 'Servivel')->get();
        return view('emprestimos.create', ['patrimonios' => $patrimonios, 'reservas' => $reservas, 'usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $emprestimo = new Emprestimo();
        $emprestimo->quantidadeemprestada = $request->quantidadeemprestada;
        $emprestimo->dataemprestimo = $request->dataemprestimo;
        $emprestimo->usuario_id = $request->usuario_id;
        $emprestimo->reserva_id = $request->reserva_id;
        $emprestimo->patrimonio_id = $request->patrimonio_id;
        $emprestimo->save();
        return redirect()->route('emprestimos.index');
    }

    public function edit($id)
    {
        $Emprestimo = Emprestimo::findorFail($id);
        $usuarios = User::all();
        $reservas = Reserva::all();
        $patrimonios = Patrimonio::all();
        return view('emprestimos.edit', ['Emprestimo' => $Emprestimo, 'patrimonios' => $patrimonios, 'reservas' => $reservas, 'usuarios' => $usuarios]);
    }

    public function update(Request $request)
    {
        Emprestimo::find($request->id)->update($request->except('_token_'));
        return redirect()->route('emprestimos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Emprestimo::findorfail($id)->delete();
            return redirect()->route('emprestimos.index')->with('msg', 'Empréstimo apagado');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este empréstimo não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o empréstimo.');
            }
        }
    }
}

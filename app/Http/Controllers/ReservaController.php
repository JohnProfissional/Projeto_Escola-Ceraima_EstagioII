<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', ['reservas' => $reservas]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm1 = $request->input('searchUser');
        $searchTerm2 = $request->input('searchDate');

        $reservas = Reserva::query();

        if ($searchTerm1) {
            $reservas->join('users', 'reservas.usuario_id', '=', 'users.id')->where('users.name', 'like', '%' . $searchTerm1 . '%');
        } elseif ($searchTerm2) {
            $reservas->whereDate('datareserva', $searchTerm2);
        }

        $reservas = $reservas->get();

        return view('reservas.index', compact('reservas'));
    }

    public function show($id)
    {
        if ($id) {
            $reserva = Reserva::where('id', $id)->get();
        } else {
            $reserva = Reserva::all();
        }
        return view('reservas.show', ['reservas' => $reserva]);
    }

    public function create()
    {
        $loggedUser = Auth::user();

        if ($loggedUser->access_level === 'admin') {
            $usuarios = User::all();
        } else {
            $usuarios = User::where('id', $loggedUser->id)->get();
        }

        $patrimonios = Patrimonio::where('status', 'Servivel')->get();
        return view('reservas.create', ['patrimonios' => $patrimonios, 'usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $reservaAtiva = Reserva::where('patrimonio_id', $request->patrimonio_id)->where('datareserva', $request->datareserva)->first();

        if ($reservaAtiva) {
            return redirect()->back()->with('error', 'Já existe uma reserva para este patrimônio nesta data. Por favor, selecione outra data.');
        }

        $reserva = new Reserva();
        $reserva->datareserva = $request->datareserva;
        $reserva->quantidadeitensreservados = $request->quantidadeitensreservados;
        $reserva->usuario_id = $request->usuario_id;
        $reserva->patrimonio_id = $request->patrimonio_id;
        $reserva->save();
        return redirect()->route('reservas.index');
    }

    public function edit($id)
    {
        $loggedUser = Auth::user();

        if ($loggedUser->access_level === 'admin') {
            $usuarios = User::all();
        } else {
            $usuarios = User::where('id', $loggedUser->id)->get();
        }

        $Reserva = Reserva::findorFail($id);
        $patrimonios = Patrimonio::where('status', 'Servivel')->get();
        return view('reservas.edit', ['Reserva' => $Reserva, 'usuarios' => $usuarios, 'patrimonios' => $patrimonios]);
    }

    public function update(Request $request)
    {
        $reserva = Reserva::find($request->id);

        if (!$reserva) {
            return redirect()->back()->with('error', 'Reserva não encontrada');
        }

        if ($reserva->patrimonio_id != $request->patrimonio_id || $reserva->datareserva != $request->datareserva) {
            $reservaAtiva = Reserva::where('patrimonio_id', $request->patrimonio_id)->where('datareserva', $request->datareserva)->where('id', '!=', $request->id)->first();

            if ($reservaAtiva) {
                return redirect()->back()->with('error', 'Já existe uma reserva para este patrimônio nesta data. Por favor, selecione outra data.');
            }
        }

        $reserva->update($request->except('_token'));

        return redirect()->route('reservas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Reserva::findorFail($id)->delete();
            return redirect()->route('reservas.index')->with('msg', 'Reserva apagada');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta reserva não pode ser excluída pois está sendo utilizada em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a reserva.');
            }
        }
    }
}

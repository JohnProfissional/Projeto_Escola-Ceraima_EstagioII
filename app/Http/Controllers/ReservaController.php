<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

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
        $user = Auth::user();
        $patrimonios = Patrimonio::where('status', 'Servivel')->get();
        return view('reservas.create', ['patrimonios' => $patrimonios, 'usuario' => $user]);
    }

    public function store(Request $request)
    {
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
        $Reserva = Reserva::findorFail($id);
        $usuarios = User::all();
        $patrimonios = Patrimonio::all();
        return view('reservas.edit', ['Reserva' => $Reserva, 'usuarios' => $usuarios, 'patrimonios' => $patrimonios]);
    }

    public function update(Request $request)
    {
        Reserva::find($request->id)->update($request->except('_token_'));
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

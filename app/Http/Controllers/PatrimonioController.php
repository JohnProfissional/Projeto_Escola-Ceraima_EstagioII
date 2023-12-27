<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Entrada;
use App\Models\Comodo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PatrimonioController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('selectCampoDeBusca');

        if ($filtro === 'serviveis') {
            $patrimonios = Patrimonio::where('status', 'Servível')->get();
        } elseif ($filtro === 'inserviveis') {
            $patrimonios = Patrimonio::where('status', 'Inservível')->get();
        } elseif ($filtro === 'desaparecidos') {
            $patrimonios = Patrimonio::where('status', 'Desaparecido')->get();
        } elseif ($filtro === 'cedidos') {
            $patrimonios = Patrimonio::where('status', 'Cedido')->get();
        } elseif ($filtro === 'manutencoes') {
            $patrimonios = Patrimonio::where('status', 'Em manutenção')->get();
        } elseif ($filtro === 'baixas') {
            $patrimonios = Patrimonio::where('status', 'Baixa patrimonial')->get();
        } else {
            $patrimonios = Patrimonio::all();
        }

        return view('patrimonios.index', ['patrimonios' => $patrimonios]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm1 = $request->input('searchDescri');
        $searchTerm2 = $request->input('searchTombo');

        $patrimonios = Patrimonio::query();

        if ($searchTerm1) {
            $patrimonios->where('descricaodopatrimonio', 'like', '%' . $searchTerm1 . '%');
        } elseif ($searchTerm2) {
            $patrimonios->where('tombo', 'like', $searchTerm2);
        }

        $patrimonios = $patrimonios->get();

        return view('patrimonios.index', compact('patrimonios'));
    }

    public function show($id)
    {
        if ($id) {
            $patrimonio = Patrimonio::where('id', $id)->get();
        } else {
            $patrimonio = Patrimonio::all();
        }
        return view('patrimonios.show', ['patrimonios' => $patrimonio]);
    }

    public function create($id = null)
    {
        $comodos = Comodo::all();

        if ($id !== null) {
            $entradas = Entrada::findOrFail($id);
            return view('patrimonios.createpatrientrada', ['entradas' => $entradas, 'comodos' => $comodos]);
        } else {
            $entradas = Entrada::all();
            return view('patrimonios.create', ['entradas' => $entradas, 'comodos' => $comodos]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tombo' => 'required|unique:patrimonios', // Verifica se o tombo é único na tabela 'patrimonios'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patrimonio = new Patrimonio();
        $patrimonio->descricaodopatrimonio = $request->descricaodopatrimonio;
        $patrimonio->tombo = $request->tombo;
        $patrimonio->valordobem = $request->valordobem;
        $patrimonio->historicodatransferencia = $request->historicodatransferencia;
        $patrimonio->dataaquisicao = $request->dataaquisicao;
        $patrimonio->status = $request->status;
        $patrimonio->entrada_id = $request->entrada_id;
        $patrimonio->comodo_id = $request->comodo_id;
        $patrimonio->save();

        $entradas = Entrada::all();
        return redirect()->route('patrimonios.index', ['entradas' => $entradas]);
    }

    public function edit($id)
    {
        $Patrimonio = Patrimonio::findorFail($id);
        $entradas = Entrada::all();
        $comodos = Comodo::all();
        return view('patrimonios.edit', ['Patrimonio' => $Patrimonio, 'entradas' => $entradas, 'comodos' => $comodos]);
    }

    public function update(Request $request)
    {
        $patrimonio = Patrimonio::find($request->id);

        $validator = Validator::make($request->all(), [
            'tombo' => [
                'required',
                Rule::unique('patrimonios')->ignore($patrimonio->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patrimonio->update($request->except('_token_'));
        return redirect()->route('patrimonios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id)
    {
        try {
            Patrimonio::findorFail($id)->delete();
            return redirect()->route('patrimonios.index')->with('msg', 'Patrimônio apagado');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este patrimônio não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o patrimônio.');
            }
        }
    }

    // PATRIENTRADA

    public function createpatrientrada($id)
    {
        $entrada = Entrada::findorFail($id);
        $comodos = Comodo::all();
        return view('patrimonios.createpatrientrada', ['entrada' => $entrada, 'comodos' => $comodos]);
    }

    public function storepatrientrada(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tombo' => 'required|unique:patrimonios', // Verifica se o tombo é único na tabela 'patrimonios'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patrimonio = new Patrimonio();
        $patrimonio->fill($request->all());
        $patrimonio->save();
        return redirect()->route('entradas.show', ['id' => $patrimonio->entrada_id]);
    }
}

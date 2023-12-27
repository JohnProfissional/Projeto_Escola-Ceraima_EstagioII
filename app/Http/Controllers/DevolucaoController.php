<?php

namespace App\Http\Controllers;

use App\Models\Devolucao;
use App\Models\Emprestimo;
use App\Models\Patrimonio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevolucaoController extends Controller
{
    public function index(){
        $devolucoes = Devolucao::all();
        return view('devolucoes.index', ['devolucoes'=>$devolucoes]);
    }

    public function indexBuscar(Request $request)
    {
        $searchTerm1 = $request->input('searchUser');
        $searchTerm2 = $request->input('searchDate');

        $devolucoes = Devolucao::query();

        if ($searchTerm1) {
            $devolucoes->join('users', 'devolucaos.usuario_id', '=', 'users.id')->where('users.name', 'like', '%' . $searchTerm1 . '%');
        } elseif ($searchTerm2) {
            $devolucoes->whereDate('datadadevolucao', $searchTerm2);
        }

        $devolucoes = $devolucoes->get();

        return view('devolucoes.index', compact('devolucoes'));
    }

    public function show($id){
        if($id){
            $devolucao = Devolucao::where('id', $id)->get();
        } else {
            $devolucao = Devolucao::all();
        }
        return view('devolucoes.show', ['devolucoes' => $devolucao]);
    }

    public function create(){
        //$usuarios = Auth::user();
        $usuarios = User::all();
        $emprestimos = Emprestimo::all();
        $patrimonios = Patrimonio::where('status', 'Servivel')->get();
        return view('devolucoes.create', ['patrimonios'=>$patrimonios, 'emprestimos'=>$emprestimos, 'usuarios'=>$usuarios]);        
    }

    public function store(Request $request){
        $devolucao = new Devolucao();
        $devolucao->datadadevolucao = $request->datadadevolucao;
        $devolucao->descricaodadevolucao = $request->descricaodadevolucao;
        $devolucao->quantidadedevolvida = $request->quantidadedevolvida;
        $devolucao->usuario_id = $request->usuario_id;
        $devolucao->patrimonio_id = $request->patrimonio_id;
        $devolucao->emprestimo_id = $request->emprestimo_id;
        $devolucao->save();
        return redirect()->route('devolucoes.index'); 
    }

    public function edit($id){
        $Devolucao = Devolucao::findorFail($id);
        $usuarios = User::all();
        $emprestimos = Emprestimo::all();
        $patrimonios = Patrimonio::all();
        return view('devolucoes.edit',['Devolucao'=>$Devolucao, 'patrimonios'=>$patrimonios, 'emprestimos'=>$emprestimos, 'usuarios'=>$usuarios]);
    }

    public function update(Request $request){
        Devolucao::find($request->id)->update($request->except('_token_'));
        return redirect()->route('devolucoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Devolucao::findorfail($id)->delete();
        return redirect()->route('devolucoes.index')->with('msg', 'Devolução apagada');
    }

}

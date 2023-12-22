<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;
use App\Models\Entrada;
use App\Models\Comodo;
use Illuminate\Http\Request;


class PatrimonioController extends Controller
{
    public function index(Request $request){
        $filtro = $request->input('selectCampoDeBusca');
        
        if($filtro === 'serviveis') {
            $patrimonios = Patrimonio::where('status', 'Servível')->get();
        } elseif($filtro === 'inserviveis') {
            $patrimonios = Patrimonio::where('status', 'Inservível')->get();
        } elseif($filtro === 'desaparecidos') {
            $patrimonios = Patrimonio::where('status', 'Desaparecido')->get();
        } else {
            $patrimonios = Patrimonio::all();
        }
    
        return view('patrimonios.index', ['patrimonios' => $patrimonios]);
    }

    public function indexBuscar(Request $request){
        $searchTerm = $request->input('search');
        
        $patrimonios = Patrimonio::query();
    
        if ($searchTerm) {
            $patrimonios->where('descricaodopatrimonio', 'like', '%' . $searchTerm . '%');
        }
    
        $patrimonios = $patrimonios->get();
    
        return view('patrimonios.index', compact('patrimonios'));
    }
    

    public function show($id){
        if($id){
            $patrimonio = Patrimonio::where('id', $id)->get();
        } else {
            $patrimonio = Patrimonio::all();
        }
        return view('patrimonios.show', ['patrimonios' => $patrimonio]);
    }

    public function create($id = null){
        $comodos = Comodo::all();

        if ($id !== null) {
            $entradas = Entrada::findOrFail($id);
            return view('patrimonios.createpatrientrada', ['entradas' => $entradas, 'comodos' => $comodos]);
        } else {
            $entradas = Entrada::all();
            return view('patrimonios.create', ['entradas' => $entradas, 'comodos' => $comodos]);
        }
    }

    public function store(Request $request){
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

    public function edit($id){
        $Patrimonio = Patrimonio::findorFail($id);
        $entradas = Entrada::all();
        $comodos = Comodo::all();
        return view('patrimonios.edit',['Patrimonio'=>$Patrimonio, 'entradas' =>$entradas, 'comodos'=>$comodos]);
    }

    public function update(Request $request){
        Patrimonio::find($request->id)->update($request->except('_token_'));
        return redirect()->route('patrimonios.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy($id){
        Patrimonio::findorFail($id)->delete();
        return redirect()->route('patrimonios.index')->with('msg','Patrimônio apagado');
    }

    public function createpatrientrada($id){
        $entrada = Entrada::findorFail($id);
        $comodos = Comodo::all();
        return view('patrimonios.createpatrientrada', ['entrada'=>$entrada, 'comodos'=>$comodos]);
    }

    public function storepatrientrada(Request $request){
        $patrimonio = new Patrimonio();
        $patrimonio->fill($request->all());
        $patrimonio->save();
        return redirect()->route('entradas.show', ['id'=>$patrimonio->entrada_id]);
    }

}

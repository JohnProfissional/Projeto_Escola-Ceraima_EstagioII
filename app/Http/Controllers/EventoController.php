<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Evento;





class EventoController extends Controller
{
    //

    public function create(){
        $Eventos = Evento::all();
        return view('Evento.create',compact('Eventos'));
    }

    public function edit($id){
        $Evento = Evento::findorFail($id);
        return view('Evento.edit',['Evento'=>$Evento]);
    }

    public function update(Request $request){
        Evento::find($request->id)->update($request->except('_token'));
        return redirect('index/evento')->with('msg', 'alteração realdizado com sucesso');
        
    }

    public function index(){
        $Evento=Evento::all();
        return view('Evento.index',compact('Evento'));
    }

    public function destroy($id){
        $Evento=Evento::findOrFail($id);
        $Evento->delete();
        return view('evento.index');
    }

     public function store(Request $request){

            $evento = new Evento();
            $evento->nome=$request->nome;
            $evento->data_inicio=$request->data_inicio;
            $evento->data_fim=$request->data_fim;
            $evento->hora_inicio=$request->hora_inicio;
            $evento->hora_terminio=$request->hora_terminio;
            $evento->save();
    }
                 
}

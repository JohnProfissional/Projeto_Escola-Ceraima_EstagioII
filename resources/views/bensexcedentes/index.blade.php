<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css'); }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=2.0">
	<title>Document</title>
</head>
<body>
@include('layouts.app')

	<div id="header">
			<h1>@yield('titulo')</h1>
			<div id="nav">
				<ul id="menu-h">
                    <li><a href="{{route('home')}}">Home</a> </li>
                    <li><a href="{{route('usuarios.index')}}">Usuarios</a> </li>
                    <li><a href="{{route('setores.index')}}">Setores</a> </li>					
					<li><a href="{{route('reservas.index')}}">Reservas</a> </li>					
					<li><a href="{{route('patrimonios.index')}}">Patrimonios</a> </li>
					<li><a href="{{route('patrimoniosinserviveis.index')}}">Patrimonios Inserviveis</a> </li>
					<li><a href="{{route('manutencaos.index')}}">Manutenção</a> </li>
                    <li><a href="{{route('desaparecidos.index')}}">Desaparecidos</a> </li>
                    <li><a href="{{route('bensexcedentes.index')}}">Bens Excedentes</a> </li>
					<li><a href="{{route('emprestimos.index')}}">Emprestimos </a> </li>
				</ul>
                
               
                
                
                
                
			</div>
	</div>
     <div class="card-body">
                  @if($errors->any())
                    <div class="alert alert-danger"> 
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach    
                        </ul>   
                    </div>        
                @endif
@section('titulo','Lista de Bens Excedentes')

  <table class="table table-sm">
 
   
      @foreach ($Bemexcedente as $bemexcedente)
      <thead>
        <tr>
          <th scope="col">id</th>
          <th>descricaodoexcedente</th><br>
          <th>observacoes</th>
          <th>quantidadeexcedente</th>
          <th>usuario_id</th>
          
        </tr>
      </thead>
       
            <td scope="row">{{$bemexcedente->id}}</td>

          <td>{{$bemexcedente->nome}}</td>
          
             <td>
                   <form action="{{route('bemexcedente.delete', ['id' => $bemexcedente->id])}}" method="post">
                    @csrf
                    @method('DELETE')   
                    <input type="submit" class="btn btn-primary" value="deletar">
                    </form> 
                </td>
                <td>
                   
                </td>
                <td>
                    <form action="{{route('bemexcedente.edit', ['id' => $bemexcedente->id])}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" name="formulario" value="alterar">
                    </form>
                </td>
          
          @endforeach
     
     
    </table><br>


     <form action="{{route('bemexcedente.create')}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" name="formulario" value="cadastrar novo Bem excedente">
                    </form>


 </div>



	 <h4>@yield('subtitulo')</h4>
  <table class="col" id="row">

  	 

       <div class="row g-3">
        <div class=col>

        </div>

       </div>


  </table>
<footer>
			<br>
			<br><br>
            <div id="footer" align="center">
			copyrigth @Sistema desenvolvido por Robério Fagundes dos Santos, John Junqueira
            </div>
</footer>
</div>



	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>
</html>
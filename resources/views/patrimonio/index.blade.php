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
@yield('conteudo')<br>
	<div id="header">
			<h1>@yield('titulo')</h1>
			<div id="nav">
				<ul id="menu-h">
                    <li><a href="{{route('home')}}">Home</a> </li>
					<li><a href="{{route('evento.index')}}">Eventos</a> </li>
					<li><a href="{{route('usuario.index')}}">Usuario</a> </li>
					<li><a href="{{route('reservas.index')}}">Reserva</a> </li>
					<li><a href="{{route('sala.index')}}">Sala</a> </li>
					<li><a href="{{route('patrimonio.index')}}">Patrimonio</a> </li>
					<li><a href="{{route('testes.index')}}">Testes</a> </li>
					<li><a href="{{route('manutencao.index')}}">Manutenção</a> </li>
					<li><a href="{{route('previsaoentregar.index')}}">Previsão de entregar de equipamentos </a> </li>
				</ul>
			</div>
      </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
 <table class="table table-sm">
 @section('titulo','lista de patrimonio') 
 <form action="{{route('patrimonio.create')}}" method="post">
        @csrf
       
        
         
               <input type="submit" class="btn btn-primary" name="formulario" value="cadastrar novo patrimônio">
     </form>
     @foreach ($Patrimonio as $patrimonio)
          <thead>
            <tr>
            
              <th>nome</th><br>
               <th>localização</th><br>
              <th>quantidade</th>
              <th>tipo do patrimonio</th>
             <th></th>
             <th></th>
             <th></th>
            </tr>
          </thead>
                
              <td>{{$patrimonio->nome}}</td>
              <td>{{$patrimonio->localizacao}}</td>
              <td>{{$patrimonio->quantidade_patrimonio}}</td>
              <td>{{$patrimonio->tipo_patrimonio}}</td>
                 <td>
                       <form action="{{route('patrimonio.delete', ['id' => $patrimonio->id])}}" method="post">
                        @csrf
                        @method('DELETE')   
                        <input type="submit" class="btn btn-primary" value="deletar">
                        </form> 
                    </td>
                    <td>
                    </td>
                    <td>
                        <form action="{{route('patrimonio.edit', ['id' => $patrimonio->id])}}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-primary" name="formulario" value="alterar">
                        </form>
                    </td>
              @endforeach  
              
         
 </table>
		</div>
        </div>
            </div>
        </div>
    </div>
</div>


	
<footer>
			<br>
			<br><br>
            <div id="footer" align="center">
			copyrigth @Sistema desenvolvido por Robério Fagundes dos Santos
            </div>
</footer>
</div>



	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>
</html>









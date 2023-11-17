<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=2.0">
	<title>Lista de Bens Excedentes</title>
</head>
<body>
	<div id="header">
		<h1>@yield('titulo')</h1>
			<div id="nav">
				<ul id="menu-h" align="center">
                    <br>
                    <td><a href="{{route('home')}}">Home</a> </td>
                    <td><a href="{{route('usuarios.index')}}">Usuarios</a> </td>
                    <td><a href="{{route('patrimonios.index')}}">Patrimonios</a> </td>
                    <td><a href="{{route('setores.index')}}">Setores</a> </td>					
                    <td><a href="{{route('comodos.index')}}">Cômodos</a> </td>
                    <td><a href="{{route('bensexcedentes.index')}}">Bens Excedentes</a> </td>
                    <td><a href="{{route('desaparecidos.index')}}">Desaparecidos</a> </td>                    
					<td><a href="{{route('reservas.index')}}">Reservas</a> </td>					
					<td><a href="{{route('baixaspatrimoniais.index')}}">Bens Excedentes</a> </td>
					<td><a href="{{route('patrimoniosinserviveis.index')}}">Patrimonios Inserviveis</a> </td>
					<td><a href="{{route('manutencaos.index')}}">Manutenção</a> </td>                    
					<td><a href="{{route('emprestimos.index')}}">Empréstimos </a> </td>
                    <td><a href="{{route('cedidos.index')}}">Cedidos</a> </td>					                    
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

    <h1>Bens Excedentes</h1>

    <table class="table table-sm">   

        @foreach ($bensexcedentes as $bemexcedente)
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                    <th>Observações</th>                                        
                </tr>
            </thead>       
                    <td scope="row">{{$bemexcedente->id}}</td>
                    <td>{{$bemexcedente->quantidadeexcedente}}</td>                                             
                    <td>{{$bemexcedente->descricaodoexcedente}}</td> 
                    <td>{{$bemexcedente->observacoes}}</td>        
                    <td><form action="{{route('bensexcedentes.edit', ['id' => $bemexcedente->id])}}" method="get">
                        @csrf
                        <input type="submit" class="btn btn-primary" name="formulario" value="Alterar">
                        </form></td>

                    <td><form action="{{route ('bensexcedentes.delete', ['id' => $bemexcedente->id])}}" method="POST">
                        @csrf
                        @method('DELETE')   
                        <input type="submit" value="Deletar"><br><br>
                        </form></td>                
        @endforeach 
    </table><br>

    <form action="{{route('bensexcedentes.create')}}" method="get">
        @csrf        
        <input type="submit" class="btn btn-primary" value="Novo+">
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
			Copyrigth @Sistema desenvolvido por ....
            </div>
    </footer>
    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>
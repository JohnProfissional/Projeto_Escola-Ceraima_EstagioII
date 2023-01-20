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


@section('titulo','cadastro de usuario')

<!--t -->
    @if($errors->any())
        
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach    
            </ul>
                
        </div>        

    @endif
    
        
        @csrf
        <div class="row g-3">
            <div>
                <h4>cadastro de evento</h4><br>
            </div>
             <form action="{{route('usuario.store')}}" method="post">
                <div class="col">
                        <label for="nomeusuario">Nome de usuário</label>
                        <input type="text" class="form-control" name="nomeusuario" id="nomeusuario"><br>
                        
                        <label for="cargo">Cargo do usuário</label>
                        <input type="text" class="form-control" name="cargo" id="cargo"><br>
                        
                        <label for="email">Email do usuário</label>
                        <input type="text" class="form-control" name="email" id="email"><br>
                        
                        <label for="senha">Senha do usuário</label>
                        <input type="text" class="form-control" name="senha" id="senha"><br>
                        
                         <input type="submit" class="btn btn-primary" value="cadastrar"> 
                </div>             
            </form>               
        </div>




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
			copyrigth @Sistema desenvolvido por Robério, John, Vinícius ...
            </div>
</footer>
</div>



	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>
</html>





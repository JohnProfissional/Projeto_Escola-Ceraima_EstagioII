

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

    @section('titulo','cadastro de teste')

    @if($errors->any())
        
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach    
            </ul>
                
        </div>        

    @endif

    <form action="{{route('testes.store')}}" method="post">
        
        @csrf
        <div class="row g-3">
                <div class="col">
                   
                    <label for="nome">nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">

                         <label>estagio</label>
                       
                        <select class="form-control"  name="estagio_id  ">
                            <option>selecione</option>
                             @foreach($Estagio as $estagio)  
                            <option value="{{ $estagio->estagio_id}}"><br>
                                {{ $estagio->nome }}<br>
                            </option>
                        @endforeach                     
                        </select><br>

                        
                         <input type="submit" class="btn btn-primary" value="cadastrar">
                        
                </div>
    
                    
                <div class="col">
                    <label>orientador</label>
                    <select class="form-control"  name="orientadors_id ">
                        <option>selecione</option>
                        @foreach($Professor_Orientador as $professor_orientador)  
                            <option value="{{ $professor_orientador->professor_orientador_id}}"><br>
                                {{ $professor_orientador->nome }}<br>
                            </option>
                        @endforeach                        
                    </select>

                     <label>curso</label>
                   
                    <select class="form-control"  name="curso_id ">
                        <option>selecione</option>
                        @foreach($Curso as $curso)  
                            <option value="{{ $curso->curso_id  }}"><br>
                                {{ $curso->nome }}<br>
                            </option>
                        @endforeach                        
                    </select>

                     <label>supervisor</label>
                   
                    <select class="form-control"  name="supervisor_estagiario_id ">
                        <option>selecione</option>
                        @foreach($Supervisor_Estagiario as $supervisor_estagiario)  
                            <option value="{{ $supervisor_estagiario->supervisor_estagiario_id  }}"><br>
                                {{ $supervisor_estagiario->nome }}<br>
                            </option>
                        @endforeach                        
                    </select>
                
                </div>
                    
                    
        </div>



    </form>
        

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




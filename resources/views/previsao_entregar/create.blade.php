

  
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


    @section('titulo','cadastro de previsão de entregar de equipamentos')

    @if($errors->any())
        
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach    
            </ul>
                
        </div>        

    @endif

    <form action="{{route('previsaoentregar.store')}}" method="post">
        
        @csrf
        <div class="row g-3">
            <h4>cadastro de previsao de entregar</h4><br>
                <div class="col">
                   
                    <label for="data da previsao de entrega">data da previsao de entrega</label>
                    <input type="date" class="form-control" name="data_previsao_entrega" id="nome">

                         <label>manutenção</label>
                       
                        <select class="form-control"  name="manutencao_id  ">
                            <option>selecione</option>
                             @foreach($Manutencao as $manutencao)  
                            <option value="{{ $manutencao->manutencao_id}}"><br>
                                {{ $manutencao->data_manutencao}}<br>
                            </option>
                        @endforeach                     
                        </select><br>

                        
                         <input type="submit" class="btn btn-primary" value="cadastrar">
                        
                </div>
    
                    
               
                
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

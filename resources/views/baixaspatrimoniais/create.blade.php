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


@section('titulo','Cadastro de Baixa_Patrimonial')

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
                <h4>Cadastro de Baixa_Patrimonial</h4><br>
            </div>
             <form action="{{route('Baixa_Patrimonial.store')}}" method="post">
                <div class="col">
                        <label for="responsavelentregar">Responsavel pela entrega</label>
                        <input type="text" class="form-control" name="responsavelentregar" id="responsavelentregar"><br>
                        
                        <label for="datadabaixa">Data da baixa</label>
                        <input type="text" class="form-control" name="datadabaixa" id="datadabaixa"><br>
                        
                        <label for="encarregadodaretirada">Encarregado da retirada</label>
                        <input type="text" class="form-control" name="encarregadodaretirada" id="encarregadodaretirada"><br>
                        
                        <label for="quantidaderetirada">Quantidade retirada</label>
                        <input type="text" class="form-control" name="quantidaderetirada" id="quantidaderetirada"><br>

                        <label for="itemretirado">Item retirado</label>
                        <input type="text" class="form-control" name="itemretirado" id="itemretirado"><br>

                        <label for="numerodoitemretirado">Número do item retirado</label>
                        <input type="text" class="form-control" name="numerodoitemretirado" id="numerodoitemretirado"><br>
                        
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





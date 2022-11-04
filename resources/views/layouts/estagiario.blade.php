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

	<div id="header">
			<h1>@yield('titulo')</h1>

			<div id="nav">
			<ul id="menu-h">
				<li><a href="">inicio</a> </li>
				<li><a href="">Professor Orientador</a> </li>
				<li><a href="">Cadastrar</a> </li>
				<li><a href="">Atividade de estagio</a> </li>
				<li><a href="">Supervisor</a> </li>
				<li><a href="">gerar relatorio de atividades</a> </li>
				<li><a href="">Sair</a> </li>
			</ul>
		</div>
		</div>



<div id="container">
	 <h4>@yield('subtitulo')</h4>
  <table class="col" id="row">

  	 @yield('conteudo')<br>

  </table>
  	<div id="footer" align="center">
		@yield('footer')
			<br>
			<br>
			copyrigth @SCGE

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</div>



</body>
</html>


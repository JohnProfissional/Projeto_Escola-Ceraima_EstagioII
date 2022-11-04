
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

	@section('titulo','edição de previsao de entregar')


<body>
	<div class="row g-3">
        <div class="col">
           	<form action="{{route('previsaoentregar.edit', ['id' => $PrevisaoEntregar->id])}}" method="post">
				<h4>Previsao da Entregar</h4><br>
				@csrf
				@method('PUT')
				
				<label for="data_previsao_entrega">data previsao entrega</label>
				{{-- Form Section 1 --}}
				<input type="text" name="data_previsao_entrega" class="form-control" value="{{$PrevisaoEntregar->data_previsao_entrega}}"><br>

				<input type="submit" class="btn btn-primary" value="editar">
			</form>
 		</div>
    </div>
		
</body>

@endsection('conteudo')

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



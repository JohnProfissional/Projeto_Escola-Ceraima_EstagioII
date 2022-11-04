
@extends('layouts.app')
@extends('layouts.main')


@section('conteudo')
	@section('titulo','categoria')
	<table>
		<tr><th>nome</th></tr>

		@foreach($Categorias as $Categoria)
		<tr>
			<td>{{$categoria->nome}}</td>
		</tr>
		@endforeach

	</table>


@endsection('conteudo')

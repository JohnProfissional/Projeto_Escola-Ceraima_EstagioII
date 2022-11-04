
@extends('layouts.app')
@extends('layouts.main')

@section('titulo','categoria')


@section('conteudo')

	<table>
		<tr><th>nome</th></tr>

		@foreach($Categorias as $Categoria)
		<tr>
			<td>{{$categoria->nome}}</td>
		</tr>
		@endforeach

	</table>


@endsection('conteudo')

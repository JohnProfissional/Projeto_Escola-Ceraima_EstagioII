
@extends('layouts.app')

@section('titulo','manutenção')


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


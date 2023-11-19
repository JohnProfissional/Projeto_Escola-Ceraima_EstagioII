@section('content')
@extends('layouts.main')
@extends('layouts.app')
@section('title','categoria')

<table>
	<tr>
		<th>nome</th>
	</tr>
	@foreach($Categorias as $Categoria)
		<tr>
			<td>{{$categoria->nome}}</td>
		</tr>
	@endforeach
</table>

@endsection('content')
@extends('layouts.main')

@section('titulo', "Cadastro de Usuário")

@section('conteudo')

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
        <form action="{{route('usuarios.store')}}" method="post">
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
</div>

<!-- <h4>@yield('subtitulo')</h4> -->
<table class="col" id="row">
    <div class="row g-3">
        <div class=col>
        </div>
    </div>
</table>

@endsection
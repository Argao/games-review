@extends('layouts.basico')

@section('titulo', 'Criar Usuario')

@section('conteudo')
    <h1>Seus dados</h1>
    <form method="post" action="{{route('usuario.update',['usuario' =>$usuario])}}">
        @method('PUT')
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" size="40" maxlength="40" required value="{{$usuario->nome}}">
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" readonly value="{{$usuario->usuario}}" >
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" size="40" maxlength="40" >
        <br>
        <label for="senha_confirmation">Confirme a senha:</label>
        <input type="password" name="senha_confirmation" id="senha_confirmation" size="40" maxlength="40" >
        <br>
        <label for="tipo">Tipo:</label>
        <input type="text"  name="tipo" id="tipo" readonly value="{{$usuario->tipo}}">
        <input type="submit" value="Atualizar">

        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </form>
@endsection

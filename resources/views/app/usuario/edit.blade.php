@extends('layouts.basico')

@section('titulo', 'Criar Usuario')

@section('conteudo')
    <h1>Seus dados</h1>

    <div class="formulario-container">

        @if (session('success'))
            <div class="success-message" >
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{route('usuario.update',['usuario' =>$usuario])}}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" size="40" maxlength="40" value="{{$usuario->nome}}" required>
                @if ($errors->has('nome'))
                    <span class="error-message">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <p id="usuario">{{$usuario->usuario}}</p>
            </div>

            <div class="form-group">
                <label for="senha">Nova senha:</label>
                <input type="password" name="senha" id="senha" size="40" maxlength="40" >
                @if ($errors->has('senha'))
                    <span class="error-message">{{ $errors->first('senha') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="senha_confirmation">Confirme a senha:</label>
                <input type="password" name="senha_confirmation" id="senha_confirmation" size="40" maxlength="40" >
                @if ($errors->has('senha_confirmation'))
                    <span class="error-message">{{ $errors->first('senha_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <p id="tipo">{{$usuario->tipo}}</p>
            </div>

            <button type="submit" class="btn-submit">Salvar</button>

        </form>
    </div>

@endsection

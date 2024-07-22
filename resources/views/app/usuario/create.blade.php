@extends('layouts.basico')

@section('titulo', 'Criar Usuario')

@section('conteudo')
    <h1>Novo Usuario</h1>
    <div class="formulario-container">

        @if (session('success'))
            <div class="success-message" >
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{route('usuario.store')}}">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" size="40" maxlength="40" required>
                @if ($errors->has('nome'))
                    <span class="error-message">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario"  required>
                @if ($errors->has('usuario'))
                    <span class="error-message">{{ $errors->first('usuario') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" size="40" maxlength="40" required>
                @if ($errors->has('senha'))
                    <span class="error-message">{{ $errors->first('senha') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="senha_confirmation">Confirme a senha:</label>
                <input type="password" name="senha_confirmation" id="senha_confirmation" size="40" maxlength="40" required>
                @if ($errors->has('senha_confirmation'))
                    <span class="error-message">{{ $errors->first('senha_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="admin">Administrador</option>
                    <option value="editor">Editor</option>
                </select>
                @if ($errors->has('tipo'))
                    <span class="error-message">{{ $errors->first('tipo') }}</span>
                @endif
            </div>

            <button type="submit" class="btn-submit">Cadastrar</button>
        </form>
    </div>

@endsection

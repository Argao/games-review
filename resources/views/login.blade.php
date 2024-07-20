@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <!-- Mensagem de Sucesso -->
            @if (session('success'))
                <div class="success-message" id="success-message">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Mensagem de Erro -->
            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="usuario">Login</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>
        </div>
    </div>
@endsection


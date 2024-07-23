@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            @if ($errors->any())
                <div class="error-message">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>


                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>

                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Lembrar') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>
        </div>
    </div>
@endsection


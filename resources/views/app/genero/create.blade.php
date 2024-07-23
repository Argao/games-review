@extends('layouts.basico')

@section('titulo', 'Adicionar Produtora')

@section('conteudo')
    <h1>Novo Gênero</h1>
    <div class="formulario-container">

        @if (session('success'))
            <div class="success-message" >
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{route('genero.store')}}">
            @csrf

            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" name="genero" id="genero" size="40" maxlength="40" required >
                @if ($errors->has('genero'))
                    <span class="error-message">{{ $errors->first('genero') }}</span>
                @endif
            </div>


            <button type="submit" class="btn-submit">Cadastrar</button>
        </form>
    </div>

@endsection

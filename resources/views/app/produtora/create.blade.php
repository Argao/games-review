@extends('layouts.basico')

@section('titulo', 'Adicionar Produtora')

@section('conteudo')
    <h1>Adicionar Produtora</h1>
    <div class="formulario-container">

        @if (session('success'))
            <div class="success-message" >
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{route('produtora.store')}}">
            @csrf

            <div class="form-group">
                <label for="produtora">Nome:</label>
                <input type="text" name="produtora" id="nome" size="40" maxlength="40" required >
                @if ($errors->has('produtora'))
                    <span class="error-message">{{ $errors->first('produtora') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="pais_id">Pais:</label>
                <select name="pais_id" id="pais">
                    @foreach($paises as $pais)
                        <option value="{{$pais->id}}">{{$pais->nome}}</option>
                    @endforeach
                </select>
                @if ($errors->has('pais_id'))
                    <span class="error-message">{{ $errors->first('pais_id') }}</span>
                @endif
            </div>

            <button type="submit" class="btn-submit">Cadastrar</button>
        </form>
    </div>

@endsection

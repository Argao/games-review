@extends('layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <h1>Detahes do jogo</h1>
    <div>
        <img src="{{$capa}}">
        <h2>{{$jogo->nome}}</h2>
        <p>
            Nota: {{ number_format($jogo->nota,1)}} / 10.0
            @if(true)
                <a href='{{route('jogo.create',$jogo)}}'><span class='material-symbols-outlined'>add_circle</span></a>
                <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                <a href='{{route('jogo.destroy',$jogo)}}'><span class='material-symbols-outlined'>delete</span></a>
            @elseif(false)
                <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
            @endif
        </p>

        <p>{{$jogo->descricao}}</p>
    </div>

@endsection

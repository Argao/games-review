@extends('layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <h1>Detahes do jogo</h1>
    <div>
        <img src="{{$capa}}">
        <h2>{{$jogo->nome}}</h2>

        Nota: {{ number_format($jogo->nota,1)}} / 10.0
        @if(true)
            <a href='{{route('jogo.create')}}'><span class='material-symbols-outlined'>add_circle</span></a>
            <a href='{{route('jogo.edit',['jogo',$jogo])}}'><span class='material-symbols-outlined'>edit</span></a>
            <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post">
                @csrf
                @method('delete')
                <button  onclick="confirmaDelete({{ $jogo->id }})" class='material-symbols-outlined'>delete</button>
            </form>

        @elseif(false)
            <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
        @endif


        <p>{{$jogo->descricao}}</p>
    </div>

@endsection

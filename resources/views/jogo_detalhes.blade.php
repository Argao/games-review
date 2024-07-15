@extends('layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <h1>Detahes do jogo</h1>
    <div>
        <img src="{{$capa}}">
        <h2>{{$jogo->nome}}</h2>
        @if(isset($_SESSION['usuario']))
            @if( $_SESSION['tipo'] == 'admin')
                <div>
                    <a href='{{route('jogo.create')}}'><span class='material-symbols-outlined'>add_circle</span></a>
                    <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                    <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post">
                        @csrf
                        @method('delete')
                        <button  onclick="confirmaDelete({{ $jogo->id }})" class='material-symbols-outlined'>delete</button>
                    </form>
                </div>
            @else
                <div>
                    <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                </div>
            @endif
        @endif
        <p>{{$jogo->descricao}}</p>
    </div>
@endsection

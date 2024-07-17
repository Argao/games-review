@extends('layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <h1>Detahes do jogo</h1>
    <div>
        <img src="{{$capa}}" alt="capa do jogo">
        <h2>{{$jogo->nome}}</h2>
        @if(isset($_SESSION['usuario']))
            @if( $_SESSION['tipo'] == 'admin')
                <div>
                    <a href='{{route('jogo.create')}}'><span class='material-symbols-outlined'>add_circle</span></a>
                    <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                    <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="button"  onclick="confirmaDelete({{ $jogo->id }})" class='material-symbols-outlined' value="delete">
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

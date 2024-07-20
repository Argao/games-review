@extends('layouts.basico')

@section('titulo', 'Detalhes')

@section('conteudo')
    <div class="details-container">
        <h2>Detalhes do Jogo</h2>
        <div class="game-details">
            <div class="game-image">
                <img src="{{ asset($capa) }}" alt="{{ $jogo->nome }}">
            </div>
            <div class="game-info">
                <h3>{{ $jogo->nome }}</h3>
                <p><strong>Gênero:</strong> {{ $jogo->genero->genero }}</p>
                <p><strong>Desenvolvedora:</strong> {{ $jogo->produtora->produtora }}</p>
                <p><strong>Nota:</strong> {{ $jogo->nota }}</p>
                <div class="game-description">{{ $jogo->descricao }}</div>
                @if(isset($_SESSION['usuario']))
                    <div class="action-buttons">
                        @if($_SESSION['tipo'] == 'admin')
                            <button class="btn-jogo">
                                <a href='{{ route('jogo.create') }}' class="material-symbols-outlined add-btn">add_circle</a>
                            </button>
                            <button class="btn-jogo">
                                <a href='{{ route('jogo.edit', $jogo) }}' class="material-symbols-outlined edit-btn">edit</a>
                            </button>
                            <form id="delete_{{ $jogo->id }}" action="{{ route('jogo.destroy', ['jogo' => $jogo, 'origem' => 'detalhes']) }}" method="post" onsubmit="return confirmaDelete()">
                                @csrf
                                @method('delete')
                                <button class="btn-jogo botao-delete">
                                    <span class="material-symbols-outlined delete-btn">delete</span>
                                </button>
                            </form>
                        @else
                            <button class="btn-jogo">
                                <a href='{{ route('jogo.edit', $jogo) }}' class="material-symbols-outlined edit-btn">edit</a>
                            </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

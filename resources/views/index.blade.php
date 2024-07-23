@extends('layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

    <form class="title-section" action="{{ route('home') }}" method="get" id="busca-form" autocomplete="on">

        <div class="search-bar">
            <label class="label-filtro" for="filter-options">Filtrar por:</label>
            <select id="filter-options" name="filtro">
                <option value="n" {{$request->filtro == 'n' ? 'selected' : ''}}>Nome</option>
                <option value="p" {{$request->filtro == 'p' ? 'selected' : ''}}>Produtora</option>
                <option value="n1" {{$request->filtro == 'n1' ? 'selected' : ''}}>Nota Alta</option>
                <option value="n2" {{$request->filtro == 'n2' ? 'selected' : ''}}>Nota Baixa</option>
            </select>
            <input type="text" placeholder="Buscar..." name="busca" id="search-input" value="{{$request->busca}}" size="10" maxlength="40" autocomplete="on">
            <button id="search-button"><i class="fas fa-search"></i> Buscar</button>

        </div>
    </form>

    <div class="games-grid">
        <!-- Exemplo de Card de Jogo -->
        @foreach($jogos as $jogo)
            <div class="game-card">
                <a href="{{route('home.detalhes',['jogo' => $jogo])}}">
                    <img src="{{\App\Http\Controllers\JogoController::verificaCapa($jogo)}}" alt="Capa do jogo {{$jogo->nome}}">
                    <h2>{{$jogo->nome}}</h2>
                    <p>[{{$jogo->genero->genero}}] - {{$jogo->produtora->produtora}}</p>
                </a>
                @if(auth()->check())
                    <div class="actions">
                        @if(auth()->user()->permission == 'admin')
                            <button class=""><a href='{{route('jogo.create')}}' class="material-symbols-outlined add-btn btn-jogo">add_circle</a></button>
                            <button class=""><a href='{{route('jogo.edit',$jogo)}}' class="material-symbols-outlined edit-btn btn-jogo">edit</a></button>
                            <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post" onsubmit="return confirmaDelete()">
                                @csrf
                                @method('delete')
                                <button class="botao-delete" >
                                    <span class="material-symbols-outlined delete-btn btn-jogo">delete</span>
                                </button>
                            </form>
                        @else
                            <button class=""><a href='{{route('jogo.edit',$jogo)}}' class="material-symbols-outlined edit-btn btn-jogo">edit</a></button>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div >
        {{$jogos->appends($request->all())->links('pagination::bootstrap-4')}}
        <br>
{{--        Exibindo {{$jogos->count()}} jogos de {{$jogos->total()}} (de {{$jogos->firstItem()}}--}}
{{--        a {{$jogos->lastItem()}})--}}
    </div>

@endsection

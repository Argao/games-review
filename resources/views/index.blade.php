@extends('layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

    <form class="title-section" action="{{ route('home') }}" method="get" id="busca-form" autocomplete="on">
        <h1>Escolha seu jogo</h1>
        <div class="filters">
            <select id="filtro-select" name="filtro">
                <option value="n" {{$request->filtro == 'n' ? 'selected' : ''}}>Nome</option>
                <option value="p" {{$request->filtro == 'p' ? 'selected' : ''}}>Produtora</option>
                <option value="n1" {{$request->filtro == 'n1' ? 'selected' : ''}}>Nota Alta</option>
                <option value="n2" {{$request->filtro == 'n2' ? 'selected' : ''}}>Nota Baixa</option>
            </select>
            <input type="text" placeholder="Buscar..." name="busca" id="busca_txt" value="{{$request->busca}}" size="10" maxlength="40" autocomplete="on">
            <button type="submit">Buscar</button>
        </div>
    </form>


    <div class="games-grid">
        <!-- Exemplo de Card de Jogo -->
        @foreach($jogos as $jogo)
            <div class="game-card">
                <img src="{{\App\Http\Controllers\JogoController::verificaCapa($jogo)}}" alt="Capa do jogo {{$jogo->nome}}">
                <h2>{{$jogo->nome}}</h2>
                <p>[{{$jogo->genero->genero}}] - {{$jogo->produtora->produtora}}</p>
                @if(isset($_SESSION['usuario']))
                    <div class="actions">
                        @if($_SESSION['tipo'] == 'admin')
                            <button class="add-btn"><a href='{{route('jogo.create')}}'>+</a></button>
                            <button class="edit-btn"><a href='{{route('jogo.edit',$jogo)}}'>✎</a></button>
                            <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="delete-btn" type="button"  onclick="confirmaDelete({{ $jogo->id }})" value="🗑" >
                            </form>
                        @else
                            <button class="edit-btn"><a href='{{route('jogo.edit',$jogo)}}'>✎</a></button>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div >
        {{$jogos->appends($request->all())->links('pagination::bootstrap-4')}}
        <br>
        Exibindo {{$jogos->count()}} jogos de {{$jogos->total()}} (de {{$jogos->firstItem()}}
        a {{$jogos->lastItem()}})
    </div>

@endsection

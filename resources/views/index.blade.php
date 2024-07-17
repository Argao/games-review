@extends('layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
{{--    {{session_destroy()}}--}}
    <h1>Escolha seu jogo</h1>
    <form action="{{ route('home',['filtro' => $request->filtro]) }}" method="get" id="busca" autocomplete="on">
        Ordenar:
        <a href="{{route('home',['filtro' => 'n','busca' => $request->busca])}}">Nome |</a>
        <a href="{{route('home',['filtro' => 'p','busca' => $request->busca])}}">Produtora |</a>
        <a href="{{route('home',['filtro' => 'n1','busca' => $request->busca])}}">Nota Alta | </a>
        <a href="{{route('home',['filtro' => 'n2','busca' => $request->busca])}}">Nota Baixa | </a>
        <a href="{{route('home',['filtro' => 'all','busca' => $request->busca])}}">Mostrar Todos |</a>
        <label for="busca_txt">Buscar:</label>
        <input type="text" name="busca" id="busca_txt" value="{{$request->busca}}" size="10" maxlength="40" autocomplete="on">
        <input type="submit" value="Ok">
    </form>

    <table class="listagem">
        @foreach($jogos as $jogo)
            <tr>
                <td><img src="{{\App\Http\Controllers\JogoController::verificaCapa($jogo)}}" alt="capa do jogo"></td>
                <td>
                    <a href="{{route('home.detalhes',$jogo)}}"> {{$jogo->nome}}</a>
                    [{{$jogo->genero->genero}}]<br>
                    {{$jogo->produtora->produtora}}
                </td>
                <td>
                   {{ number_format($jogo->nota,1)}} / 10.0
                </td>

                @if(isset($_SESSION['usuario']))
                    @if( $_SESSION['tipo'] == 'admin')
                        <td>
                            <a href='{{route('jogo.create')}}'><span class='material-symbols-outlined'>add_circle</span></a>
                            <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                            <form id="delete_{{$jogo->id}}" action="{{ route('jogo.destroy', $jogo) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="button"  onclick="confirmaDelete({{ $jogo->id }})" class='material-symbols-outlined' value="delete">
                            </form>
                        </td>
                    @else
                        <td>
                            <a href='{{route('jogo.edit',$jogo)}}'><span class='material-symbols-outlined'>edit</span></a>
                        </td>
                    @endif
                @endif
            </tr>

        @endforeach
    </table>


    <div >
        {{$jogos->appends($request->all())->links('pagination::bootstrap-4')}}
        <br>
        Exibindo {{$jogos->count()}} jogos de {{$jogos->total()}} (de {{$jogos->firstItem()}}
        a {{$jogos->lastItem()}})
    </div>

@endsection

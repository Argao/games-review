@extends('layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <main>
        <h1>Escolha seu jogo</h1>
        <form action="" method="get" id="busca" autocomplete="on">
            Ordenar:
            <a href="">Nome |</a>
            <a href="">Produtora |</a>
            <a href="">Nota Alta |</a>
            <a href="">Nota Baixa | </a>
            <a href="">Mostrar Todos |</a>
            <label for="c">Buscar:</label>
            <input type="text" name="c" id="c" seize="10" maxlength="40"  autocomplete="on">
            <input type="submit" value="Ok">
        </form>

        <table class="listagem">
            @foreach($jogos as $jogo)
                <tr>
                    <td>
                        <a href=""> {{$jogo->nome}}</a>
                        {{$jogo->genero}} <br>
                        {{$jogo->produtora}}
                    </td>

                    @if(true)
                        <td>
                            <a href=''><span class='material-symbols-outlined'>add_circle</span></a>
                            <a href=''><span class='material-symbols-outlined'>edit</span></a>
                            <a href=''><span class='material-symbols-outlined'>delete</span></a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        {{$jogos->appends($request)->links()}}

        <br>
        Exibindo {{$jogos->count()}} jogos de {{$jogos->total()}} (de {{$jogos->firstItem()}}
        a {{$jogos->lastItem()}})
    </main>
@endsection

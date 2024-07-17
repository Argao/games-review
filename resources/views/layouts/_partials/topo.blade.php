@if(isset($_SESSION['usuario']))
    Olá <strong>{{$_SESSION['nome']}}</strong> |
    <a href="{{route('usuario.edit',['id' => $_SESSION['usuario']])}}">Meus Dados</a> |
    @if($_SESSION['tipo'] == 'admin')
        <a href="{{ route('usuario.create') }}"> Novo usuário</a> |
        <a href="{{ route('jogo.create') }}">Novo Jogo</a> |
    @endif
    <a href="{{route('app.sair')}}">Sair</a>
@else
    <a href="{{route('login')}}">Entrar</a>
@endif


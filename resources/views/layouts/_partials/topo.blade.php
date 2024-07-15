@if(isset($_SESSION['usuario']))
    Olá <strong>{{$_SESSION['nome']}}</strong> |
    <a href="#">Meus Dados</a> |
    @if($_SESSION['tipo'] == 'admin')
        <a href="#"> Novo usuário</a> |
        <a href="#">Novo Jogo</a> |
    @endif
    <a href="{{route('app.sair')}}">Sair</a>
@else
    <a href="{{route('login')}}">Entrar</a>
@endif


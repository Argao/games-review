<nav>
    <div class="logo"><a href="{{ route('home') }}">GameChoice </a> </div>
    <ul class="nav-links">
    @if(isset($_SESSION['usuario']))
        <li><a href="{{route('usuario.edit',['id' => $_SESSION['usuario']])}}">Meus Dados</a></li> |
        @if($_SESSION['tipo'] == 'admin')
            <li><a href="{{ route('usuario.create') }}"> Novo usuário</a></li> |
            <li><a href="{{ route('jogo.create') }}">Novo Jogo</a></li> |
        @endif
        <li><a href="{{route('app.sair')}}">Sair</a></li>
    @else
        <li><a href="{{route('login')}}">Entrar</a></li>
    @endif
    </ul>
</nav>

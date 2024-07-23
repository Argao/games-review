<nav>
    <div class="logo"><a href="{{ route('home') }}">GamesReview</a> </div>
    <ul class="nav-links">
    @if(auth()->check())
        <li><a href="{{route('user.edit',auth()->user()->id)}}">Meus Dados</a></li> |
        @if(auth()->user()->permission == 'admin')
            <li><a href="{{route('user.create')}}"> Novo usuário</a></li> |
            <li><a href="{{ route('jogo.create') }}">Novo Jogo</a></li> |
        @endif
        <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
    @else
        <li><a href="{{route('login')}}">Entrar</a></li>
    @endif
    </ul>
</nav>

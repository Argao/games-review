
<p class="pequeno">
@if(false)
    <a href="#">Entrar</a>
@else
    Olá <strong>Nome</strong> |
    <a href="#">Meus Dados</a> |
    @if(true)
        <a href="#"> Novo usuário</a> |
        <a href="{{route('jogo.create')}}">Novo Jogo</a> |
    @endif
    <a href="#">Sair</a>
@endif
</p>


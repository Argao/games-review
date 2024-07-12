
Olá <strong>Nome</strong> |
<a href="{{}}">Meus Dados</a> |
@if($_SESSION['tipo'] == 'admin')
    <a href="#"> Novo usuário</a> |
    <a href="{{route('')}}">Novo Jogo</a> |
@endif
<a href="#">Sair</a>

<form method="post" action="{{route('usuario.store')}}">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" size="40" maxlength="40" required>
    <br>
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario"  required>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" size="40" maxlength="40" required>
    <br>
    <label for="senha_confirmation">Confirme a senha:</label>
    <input type="password" name="senha_confirmation" id="senha_confirmation" size="40" maxlength="40" required>
    <br>
    <select name="tipo" id="tipo">
        <option value="admin">Administrador</option>
        <option value="editor">Editor</option>
    </select>
    <input type="submit" value="Cadastrar">
</form>

<form method="post" action="{{route('jogo.store')}}"  enctype="multipart/form-data">
    @csrf
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" required>

    <select name="genero_id">
        <option> -- Selecione o gênero do jogo --</option>

        @foreach($generos as $genero)
            <option value="{{$genero->id}}">{{$genero->genero}}</option>
        @endforeach
    </select>

    <select name="produtora_id">
        <option> -- Selecione a produtora do jogo --</option>

        @foreach($produtoras as $produtora)
            <option value="{{$produtora->id}}">{{$produtora->produtora}}</option>
        @endforeach
    </select>

    <label for="descricao">Descrição</label>
    <textarea id="descricao"  name="descricao"></textarea>

    <label for="nota">Nota</label>
    <input type="number" name="nota" id="nota" min="0" max="10" maxlength="10" step="0.5"  required>

    <label for="capa">Capa do Jogo</label>
    <input type="file" name="capa" id="capa" >


    <button type="submit">Salvar</button>
</form>

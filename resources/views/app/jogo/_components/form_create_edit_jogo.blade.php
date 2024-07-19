
@csrf

<div class="form-group">
    <label for="nome">Nome</label>
    <input value="{{$jogo->nome ?? old('nome')}}"  type="text" name="nome" id="nome" required>
</div>

<div class="form-group">
    <label for="genero_id">Gênero</label>
    <select name="genero_id">
        <option> -- Selecione o gênero do jogo --</option>
        @foreach($generos as $genero)
            <option value="{{$genero->id}}" {{($jogo->genero_id ?? old('genero_id')) == $genero->id ? 'selected' : ''}}>{{$genero->genero}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="produtora_id">Produtora</label>
    <select name="produtora_id">
        <option> -- Selecione a produtora do jogo --</option>
    
        @foreach($produtoras as $produtora)
            <option value="{{$produtora->id}}" {{($jogo->produtora ?? old('produtora_id') == $produtora->id ? 'selected' : '')}}>{{$produtora->produtora}}</option>
        @endforeach
    </select>
</div>

<div class="form-group"> 
    <label for="descricao">Descrição</label>
    <textarea id="descricao"  name="descricao">{{($jogo->descricao ?? old('descricao')) != '' ? $jogo->descricao ?? old('descricao') : ''}}</textarea>
</div>

<div class="form-group">
    <label for="nota">Nota</label>
    <input type="number" value="{{$jogo->nota ?? old('nota')}}" name="nota" id="nota" min="0" max="10" maxlength="10" step="0.5"  required>
</div>


<div class="form-group" >
    @if(isset($jogo->capa))
        <div>
            <label>Capa Atual do Jogo:</label>
            <img src="{{ asset('img/' . $jogo->capa) }}" alt="Capa do Jogo" style="width: 100px; height: auto;">
        </div>
    @endif
    
    <label for="capa">Capa do Jogo</label>
    <input style="border: none; padding-left: 0.1em" type="file" name="capa" id="capa"  value="{{old('capa')}}">
</div>


<button type="submit" class="btn-submit">Salvar</button>


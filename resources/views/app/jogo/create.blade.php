@extends('layouts.basico')

@section('titulo', 'Adicionar Jogo')

@section('conteudo')
    <h1>Novo Jogo</h1>
    <div class="formulario-container ">
        <form method="post" action="{{route('jogo.store')}}"  enctype="multipart/form-data">
            @component('app.jogo._components.form_create_edit_jogo',['generos' => $generos,'produtoras' => $produtoras])
            @endcomponent
        </form>
    </div>
@endsection

@extends('layouts.basico')

@section('titulo', 'Adicionar Jogo')

@section('conteudo')
    <h1>Novo Jogo</h1>
    @component('app.jogo._components.form_create_edit_jogo',['generos' => $generos,'produtoras' => $produtoras])
    @endcomponent
@endsection

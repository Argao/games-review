@extends('layouts.basico')

@section('titulo', 'Editar Jogo')

@section('conteudo')
    <h1>Editar Jogo</h1>
    @component('jogo._components.form_create_edit_jogo',['generos' => $generos,'produtoras' => $produtoras,'jogo' => $jogo])
    @endcomponent
@endsection

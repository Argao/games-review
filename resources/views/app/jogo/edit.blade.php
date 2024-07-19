@extends('layouts.basico')

@section('titulo', 'Editar Jogo')

@section('conteudo')
    <h1>Editar Jogo</h1>
    <div class="formulario-container ">
        <form method="post" action="{{ route('jogo.update',$jogo) }}" enctype="multipart/form-data" >
            @method('PUT')
            @component('app.jogo._components.form_create_edit_jogo',['generos' => $generos,'produtoras' => $produtoras,'jogo' => $jogo])
            @endcomponent
        </form>
    </div>
@endsection

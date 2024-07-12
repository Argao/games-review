@extends('layouts.basico')

@section('titulo', 'Criar Usuario')

@section('conteudo')
    <h1>Novo Usuario</h1>
    @component('app.usuario._components.form_create_edit_usuario')
    @endcomponent
@endsection

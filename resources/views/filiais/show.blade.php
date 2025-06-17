@extends('adminlte::page')

@section('title', 'Detalhes da Filial')

@section('content_header')
    <h1>Detalhes da Filial</h1>
@stop

@section('content')
    <a href="{{ route('filiais.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $filial->id }}</p>
            <p><strong>Nome da Filial:</strong> {{ $filial->nomedafilial }}</p>
            <p><strong>Endereço:</strong> {{ $filial->endereco }}</p>
            <p><strong>Número:</strong> {{ $filial->nun_end }}</p>
            <p><strong>Bairro:</strong> {{ $filial->bairro }}</p>
            <p><strong>Cidade:</strong> {{ $filial->cidade }}</p>
            <p><strong>UF:</strong> {{ $filial->uf }}</p>
            <p><strong>CEP:</strong> {{ $filial->cep }}</p>
        </div>
    </div>
@stop

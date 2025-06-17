@extends('adminlte::page')

@section('title', 'Nova Filial')

@section('content_header')
    <h1>Nova Filial</h1>
@stop

@section('content')
    <a href="{{ route('filiais.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Por favor, corrija os erros abaixo.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filiais.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nomedafilial">Nome da Filial</label>
            <input type="text" name="nomedafilial" class="form-control" value="{{ old('nomedafilial') }}" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}" required>
        </div>

        <div class="form-group">
            <label for="nun_end">Número</label>
            <input type="text" name="nun_end" class="form-control" value="{{ old('nun_end') }}" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" value="{{ old('bairro') }}" required>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" class="form-control" value="{{ old('cidade') }}" required>
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" name="uf" class="form-control" value="{{ old('uf') }}" maxlength="2" required>
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" class="form-control" value="{{ old('cep') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@stop

@extends('adminlte::page')

@section('title', 'Editar Filial')

@section('content_header')
    <h1>Editar Filial</h1>
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

    <form action="{{ route('filiais.update', $filial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomedafilial">Nome da Filial</label>
            <input type="text" name="nomedafilial" class="form-control" value="{{ old('nomedafilial', $filial->nomedafilial) }}" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $filial->endereco) }}" required>
        </div>

        <div class="form-group">
            <label for="nun_end">Número</label>
            <input type="text" name="nun_end" class="form-control" value="{{ old('nun_end', $filial->nun_end) }}" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" value="{{ old('bairro', $filial->bairro) }}" required>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" class="form-control" value="{{ old('cidade', $filial->cidade) }}" required>
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" name="uf" class="form-control" value="{{ old('uf', $filial->uf) }}" maxlength="2" required>
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" class="form-control" value="{{ old('cep', $filial->cep) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop

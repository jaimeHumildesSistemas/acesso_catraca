@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>Editar Produto</h1>
@endsection

@section('content')
    <form action="{{ route('produtos.update', $produto->idproduto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="{{ $produto->descricao }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Valor:</label>
            <input type="text" name="valor" value="{{ $produto->valor }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection

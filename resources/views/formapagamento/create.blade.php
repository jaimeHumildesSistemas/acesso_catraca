@extends('adminlte::page')

@section('title', 'Nova Forma de Pagamento')

@section('content_header')
    <h1>Nova Forma de Pagamento</h1>
@endsection

@section('content')
    <form action="{{ route('formapagamento.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('formapagamento.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection

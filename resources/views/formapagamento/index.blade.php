@extends('adminlte::page')

@section('title', 'Formas de Pagamento')

@section('content_header')
    <h1>Formas de Pagamento</h1>
@endsection

@section('content')
    <a href="{{ route('formapagamento.create') }}" class="btn btn-success mb-3">Nova Forma</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formas as $forma)
                <tr>
                    <td>{{ $forma->id }}</td>
                    <td>{{ $forma->descricao }}</td>
                    <td>
                        <a href="{{ route('formapagamento.edit', $forma->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('formapagamento.destroy', $forma->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

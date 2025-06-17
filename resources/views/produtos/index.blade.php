@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@endsection

@section('content')
    <a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">Novo Produto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Nome do Usuário </th>
                <th>Data </th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->idproduto }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                    <td>{{ optional($produto->userCriador)->name }}</td>

                    <td>
                        {{ $produto->data_ins ? \Carbon\Carbon::parse($produto->data_ins)->format('d-m-Y') : '' }}
                    </td>

                    <td>
                        <a href="{{ route('produtos.edit', $produto->idproduto) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->idproduto) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <h1>Filiais</h1>
@stop

@section('content')
    <a href="{{ route('filiais.create') }}" class="btn btn-primary mb-3">Nova Filial</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Filial</th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filiais as $filial)
                        <tr>
                            <td>{{ $filial->id }}</td>
                            <td>{{ $filial->nomedafilial }}</td>
                            <td>{{ $filial->endereco }}</td>
                            <td>{{ $filial->nun_end }}</td>
                            <td>{{ $filial->bairro }}</td>
                            <td>{{ $filial->cidade }}</td>
                            <td>{{ $filial->uf }}</td>
                            <td>{{ $filial->cep }}</td>
                            <td>
                                <a href="{{ route('filiais.show', $filial) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('filiais.edit', $filial) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('filiais.destroy', $filial) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Confirma exclusão?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $filiais->links() }}
@stop

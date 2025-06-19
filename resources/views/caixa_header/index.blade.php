@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Fechamentos de Caixa</h2>
    <a href="{{ route('caixa_header.create') }}" class="btn btn-primary mb-3">Novo Fechamento</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Total Bruto</th>
                <th>Desconto</th>
                <th>Liquido</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fechamentos as $fechamento)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($fechamento->datafechamento)->format('d/m/Y H:i') }}</td>
                    <td>R$ {{ number_format($fechamento->total_bruto, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($fechamento->total_desconto, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($fechamento->total_liquido, 2, ',', '.') }}</td>
                    <td><a href="{{ route('caixa_header.show', $fechamento->id) }}" class="btn btn-sm btn-info">Ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

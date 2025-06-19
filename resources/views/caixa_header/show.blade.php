@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detalhes do Fechamento</h3>

    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($caixa->datafechamento)->format('d/m/Y H:i') }}</p>
    <p><strong>Bruto:</strong> R$ {{ number_format($caixa->total_bruto, 2, ',', '.') }}</p>
    <p><strong>Desconto:</strong> R$ {{ number_format($caixa->total_desconto, 2, ',', '.') }}</p>
    <p><strong>Acréscimo:</strong> R$ {{ number_format($caixa->total_acrescimo, 2, ',', '.') }}</p>
    <p><strong>Liquido:</strong> R$ {{ number_format($caixa->total_liquido, 2, ',', '.') }}</p>
    <p><strong>Forma de Pagamento:</strong> {{ $caixa->formadepagamento }}</p>

    <h4 class="mt-4">Lançamentos no Fluxo de Caixa</h4>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caixa->fluxos as $fluxo)
                <tr>
                    <td>{{ ucfirst($fluxo->tipo) }}</td>
                    <td>R$ {{ number_format($fluxo->valor, 2, ',', '.') }}</td>
                    <td>{{ $fluxo->descricao }}</td>
                    <td>{{ \Carbon\Carbon::parse($fluxo->dataregistro)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('caixa_header.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Fechamento de Caixa</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Resumo do Caixa</h5>
            <ul class="list-group">
                <li class="list-group-item">💰 Total Bruto: <strong>R$ {{ number_format($totalBruto, 2, ',', '.') }}</strong></li>
                <li class="list-group-item">💸 Total de Desconto: <strong>R$ {{ number_format($totalDesconto, 2, ',', '.') }}</strong></li>
                <li class="list-group-item">📈 Total de Acréscimo: <strong>R$ {{ number_format($totalAcrescimo, 2, ',', '.') }}</strong></li>
                <li class="list-group-item bg-light">✅ <strong>Total Líquido: R$ {{ number_format($valorLiquido, 2, ',', '.') }}</strong></li>
            </ul>

            <h5 class="mt-4">Totais por Forma de Pagamento</h5>
            <ul class="list-group">
                @foreach($totaisPorForma as $forma => $valor)
                    <li class="list-group-item">
                        {{ $forma ?? 'Desconhecido' }}: R$ {{ number_format($valor, 2, ',', '.') }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <form method="POST" action="{{ route('caixa_header.store') }}">
        @csrf

        <!-- Campos ocultos com os valores calculados -->
        <input type="hidden" name="valor_bruto" value="{{ $totalBruto }}">
        <input type="hidden" name="desconto" value="{{ $totalDesconto }}">
        <input type="hidden" name="acrescimo" value="{{ $totalAcrescimo }}">
        <input type="hidden" name="valor_liquido" value="{{ $valorLiquido }}">

        <div class="text-end">
            <button type="submit" class="btn btn-success">
                💾 Fechar Caixa Agora
            </button>
        </div>
    </form>
</div>
@endsection

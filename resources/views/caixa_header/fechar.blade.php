<h3>Resumo Fechamento</h3>
<ul>
    <li>Valor de Abertura: R$ {{ number_format($caixa->valor_abertura, 2, ',', '.') }}</li>
    <li>Total Bruto: R$ {{ number_format($totalBruto, 2, ',', '.') }}</li>
    <li>Desconto: R$ {{ number_format($totalDesconto, 2, ',', '.') }}</li>
    <li>Acréscimo: R$ {{ number_format($totalAcrescimo, 2, ',', '.') }}</li>
    <li><strong>Valor de Fechamento: R$ {{ number_format($valorFechamento, 2, ',', '.') }}</strong></li>
</ul>

<form method="POST" action="{{ route('caixa_header.fechar.store') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $caixa->id }}">
    <input type="hidden" name="valor_bruto" value="{{ $totalBruto }}">
    <input type="hidden" name="desconto" value="{{ $totalDesconto }}">
    <input type="hidden" name="acrescimo" value="{{ $totalAcrescimo }}">
    <input type="hidden" name="valor_liquido" value="{{ $valorFechamento }}">

    <button type="submit" class="btn btn-success">Confirmar Fechamento</button>
</form>

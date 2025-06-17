@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-end my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalQrCode">
      <i class="bi bi-plus-circle"></i> Gerar Novo QR Code
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalQrCode" tabindex="-1" aria-labelledby="modalQrCodeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="formQrCode">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalQrCodeLabel">Gerar Novo QR Code</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            @csrf

            <div class="mb-3">
              <label for="idproduto" class="form-label">Produto</label>
              <select id="idproduto" name="idproduto" class="form-select" required>
                <option value="" disabled selected>Selecione o produto</option>
                @foreach($produtos as $produto)
                  <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">
                    {{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="valor" class="form-label">Valor</label>
              <input type="text" id="valor" name="valor" class="form-control" readonly>
            </div>

            <div class="mb-3">
              <label for="desconto" class="form-label">Desconto</label>
              <input type="number" id="desconto" name="desconto" class="form-control" value="0" min="0" step="0.01">
            </div>

            <div class="mb-3">
              <label for="acrescimo" class="form-label">Acréscimo</label>
              <input type="number" id="acrescimo" name="acrescimo" class="form-control" value="0" min="0" step="0.01">
            </div>

            <div class="mb-3">
              <label for="valorapagar" class="form-label">Valor Total a Pagar</label>
              <input type="text" id="valorapagar" name="valorapagar" class="form-control" readonly>
            </div>

            <div class="mb-3">
              <label for="formadepagamento" class="form-label">Forma de Pagamento</label>
              <select id="formadepagamento" name="formadepagamento" class="form-select" required>
                <option value="" disabled selected>Selecione a forma de pagamento</option>
                @foreach($formasPagamento as $forma)
                  <option value="{{ $forma->nome }}">{{ $forma->nome }}</option>
                @endforeach
              </select>
            </div>

            <div id="resultadoQrCode" class="text-center"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Gerar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const idproduto = document.getElementById('idproduto');
  const valor = document.getElementById('valor');
  const desconto = document.getElementById('desconto');
  const acrescimo = document.getElementById('acrescimo');
  const valorapagar = document.getElementById('valorapagar');
  const formadepagamento = document.getElementById('formadepagamento');
  const resultadoQrCode = document.getElementById('resultadoQrCode');
  const formQrCode = document.getElementById('formQrCode');

  // Atualiza valor ao selecionar produto
  idproduto.addEventListener('change', function() {
    const option = idproduto.options[idproduto.selectedIndex];
    const val = parseFloat(option.getAttribute('data-valor'));
    valor.value = val.toFixed(2).replace('.', ',');
    calculaTotal();
  });

  // Atualiza total quando desconto ou acrescimo mudam
  desconto.addEventListener('input', calculaTotal);
  acrescimo.addEventListener('input', calculaTotal);

  function calculaTotal() {
    let v = parseFloat(valor.value.replace(',', '.')) || 0;
    let d = parseFloat(desconto.value) || 0;
    let a = parseFloat(acrescimo.value) || 0;
    let total = v - d + a;
    if (total < 0) total = 0;
    valorapagar.value = total.toFixed(2).replace('.', ',');
  }

  // Submeter formulário via AJAX
  formQrCode.addEventListener('submit', function(e) {
    e.preventDefault();
    resultadoQrCode.innerHTML = '';

    // Dados para enviar
    const data = {
      _token: document.querySelector('input[name="_token"]').value,
      idproduto: idproduto.value,
      valor: parseFloat(valor.value.replace(',', '.')),
      desconto: parseFloat(desconto.value),
      acrescimo: parseFloat(acrescimo.value),
      valorapagar: parseFloat(valorapagar.value.replace(',', '.')),
      formadepagamento: formadepagamento.value
    };

    fetch("{{ route('qrcode.gerar') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': data._token
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(json => {
      if(json.success) {
        resultadoQrCode.innerHTML = json.qrcode;
      } else {
        resultadoQrCode.innerHTML = '<div class="alert alert-danger">Erro ao gerar QR Code</div>';
      }
    })
    .catch(() => {
      resultadoQrCode.innerHTML = '<div class="alert alert-danger">Erro na comunicação</div>';
    });
  });
});
</script>
@endpush

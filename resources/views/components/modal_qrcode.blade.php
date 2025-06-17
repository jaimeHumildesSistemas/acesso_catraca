<!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalQrCode">
  Gerar Novo QR Code
</button>

<!-- Modal -->
<div class="modal fade" id="modalQrCode" tabindex="-1" aria-labelledby="modalQrCodeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formGerarQr" method="POST" action="{{ route('caixa.gerarQr') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalQrCodeLabel">Gerar Novo QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Produto -->
          <label>Produto:</label>
          <select name="idproduto" class="form-control" id="produtoSelect" required>
            @foreach($produtos as $produto)
              <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">{{ $produto->nome }}</option>
            @endforeach
          </select>

          <!-- Valor Produto -->
          <label>Valor:</label>
          <input type="text" id="valorProduto" name="valor" class="form-control" readonly>

          <!-- Desconto -->
          <label>Desconto:</label>
          <input type="number" step="0.01" name="desconto" class="form-control" value="0">

          <!-- Acréscimo -->
          <label>Acréscimo:</label>
          <input type="number" step="0.01" name="acrescimo" class="form-control" value="0">

          <!-- Total a Pagar -->
          <label>Total a Pagar:</label>
          <input type="text" id="valorTotal" name="valorapagar" class="form-control" readonly>

          <!-- Forma de Pagamento -->
          <label>Forma de Pagamento:</label>
          <select name="formadepagamento" class="form-control" required>
            @foreach($formasPagamento as $forma)
              <option value="{{ $forma->descricao }}">{{ $forma->descricao }}</option>
            @endforeach
          </select>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Gerar QR Code</button>
        </div>
      </div>
    </form>
  </div>
</div>

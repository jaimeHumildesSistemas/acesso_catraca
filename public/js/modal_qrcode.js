document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btnGerarQrCode');
    if (btn) {
        btn.addEventListener('click', function () {
            document.getElementById('produtoSelect').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                const valor = parseFloat(selected.getAttribute('data-valor')) || 0;
                document.getElementById('valorProduto').value = valor.toFixed(2);
                calcularTotal();
            });

            document.querySelectorAll('input[name="desconto"], input[name="acrescimo"]').forEach(function (input) {
                input.addEventListener('input', calcularTotal);
            });

            function calcularTotal() {
                const valor = parseFloat(document.getElementById('valorProduto').value) || 0;
                const desconto = parseFloat(document.querySelector('input[name="desconto"]').value) || 0;
                const acrescimo = parseFloat(document.querySelector('input[name="acrescimo"]').value) || 0;
                const total = (valor - desconto + acrescimo);
                document.getElementById('valorTotal').value = total.toFixed(2);
            }
        });
    }
});

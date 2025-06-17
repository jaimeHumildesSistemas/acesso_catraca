<!-- Scripts e CSS necessários -->
<script src="{{ asset('js/qrcode.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Estilos customizados -->
<style>
    body {
        background-color: #ffffff;
        padding: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .btn-custom {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-bottom: 20px;
    }

    .btn-custom:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .dashboard {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .card-stat {
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        padding: 20px 30px;
        border-radius: 10px;
        text-align: center;
        min-width: 200px;
    }

    .card-stat h3 {
        margin: 0;
        font-size: 22px;
        color: #333;
    }

    .card-stat p {
        margin: 5px 0 0;
        font-size: 18px;
        color: #555;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    thead {
        background-color: #343a40;
        color: white;
    }

    th, td {
        padding: 14px 20px;
        text-align: center;
        border-bottom: 1px solid #e2e2e2;
    }

    th {
        font-weight: bold;
        font-size: 15px;
    }

    td {
        font-size: 14px;
        color: #555;
    }

    tr:hover {
        background-color: #f1f9ff;
    }

    .badge {
        padding: 6px 12px;
        font-size: 12px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff !important;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff !important;
    }

    #qrcode-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #qrcodeTable_wrapper {
        margin-top: 20px;
    }

    .dataTables_filter input {
        border-radius: 4px;
        padding: 5px 10px;
        border: 1px solid #ccc;
    }
</style>

<!-- Conteúdo da Página -->
<div class="container">
    <h2>Controle de Acessos</h2>

    <div class="dashboard">
        <div class="card-stat">
            <h3>Total</h3>
            <p>{{ $totalQRCodes }}</p>
        </div>
        <div class="card-stat">
            <h3>Usados</h3>
            <p>{{ $qrcodesUsados }}</p>
        </div>
        <div class="card-stat">
            <h3>Disponíveis</h3>
            <p>{{ $qrcodesDisponiveis }}</p>
        </div>
    </div>

    <div style="text-align: center;">
        <a href="{{ route('qrcode.gerar') }}" class="btn-custom">
            <i class="bi bi-plus-circle"></i> Gerar Novo QR Code
        </a>
    </div>

    <table id="qrcodeTable">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Status</th>
                <th>Data de Uso</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($qrcodes as $qr)
<tr>
    <td>
        <div id="qrcode-{{ $qr->id }}">
            {!! QrCode::size(100)->generate('http://192.168.1.90/api/catraca/verificar/' . $qr->code) !!}

        </div>
        <button class="btn-custom" onclick="imprimirQRCode('qrcode-{{ $qr->id }}')">Imprimir</button>
    </td>
    <td>
        @if ($qr->used_at)
            <span class="badge badge-danger">Usado</span>
        @else
            <span class="badge badge-success">Disponível</span>
        @endif
    </td>
    <td>{{ optional($qr->used_at)->format('d/m/Y H:i') ?? '---' }}</td>
    <td>{{ optional($qr->created_at)->format('d/m/Y H:i') ?? '---' }}</td>
</tr>
@endforeach

        </tbody>
    </table>
</div>

<!-- DataTables Config -->
<script>
    $(document).ready(function () {
        $('#qrcodeTable').DataTable({
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "pageLength": 5
        });
    });
</script>

<script>
function imprimirQRCode(elementId) {
    const qrContent = document.getElementById(elementId).innerHTML;
    const printWindow = window.open('', '', 'width=300,height=300');
    printWindow.document.write(`
        <html>
            <head>
                <title>Imprimir QR Code</title>
                <style>
                    body { text-align: center; padding: 30px; font-family: Arial, sans-serif; }
                </style>
            </head>
            <body>
                ${qrContent}
                <script>
                    window.onload = function () {
                        window.print();
                        window.onafterprint = function () {
                            window.close();
                        };
                    };
                <\/script>
            </body>
        </html>
    `);
    printWindow.document.close();
}
</script>

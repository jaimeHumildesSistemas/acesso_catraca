<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Status do Acesso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            text-align: center;
            padding: 50px;
        }
        .status-container {
            display: inline-block;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }
        .status-liberado {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 20px;
            font-size: 2rem;
            font-weight: bold;
        }
        .status-negado {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 20px;
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="status-container">
    @if ($status === 'liberado')
        <div class="status-liberado">
            Acesso <strong>Liberado</strong> ✅
        </div>
    @elseif ($status === 'negado')
        <div class="status-negado">
            Acesso <strong>Negado</strong> ❌
        </div>
    @else
        <div>
            Status desconhecido.
        </div>
    @endif
</div>

</body>
</html>

<?php

echo "Iniciando teste de comunicação com a catraca...\n";

try {
    $com = new COM("EasyInner.EasyInner");
    echo "✅ Objeto COM criado com sucesso!\n";

    $com->Inicializar();
    echo "✅ Inicializado\n";

    $ipCatraca = '192.168.1.125';
    $porta = 3570; // verifique com o fabricante se é essa mesma porta
    $com->ConfigurarRede($ipCatraca, $porta);
    echo "✅ Configuração de rede feita para IP $ipCatraca e porta $porta\n";

    $com->HabilitaEntrada();
    echo "✅ Entrada habilitada (catraca deve bipar ou acender luz verde)\n";

    sleep(5);

    $com->DesabilitaEntrada();
    echo "✅ Entrada desabilitada\n";

    $com->Finalizar();
    echo "✅ Comunicação finalizada com sucesso!\n";

} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}

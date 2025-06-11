<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // importante!

class TesteImageController extends Controller
{
    public function testeGD()
    {
        $ipCatraca = '192.168.1.125'; // IP da catraca (confirme o IP completo, normalmente é algo como 192.168.125.x)

    // Executa o comando ping 1 pacote
    $output = [];
    $return_var = null;
    exec("ping -n 1 $ipCatraca", $output, $return_var);

    if ($return_var === 0) {
        return response()->json(['status' => 'success', 'message' => 'Catraca está acessível (ping OK)']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'Não foi possível alcançar a catraca (ping falhou)']);
    }
}


}
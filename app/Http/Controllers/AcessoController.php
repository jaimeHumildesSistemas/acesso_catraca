<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\QRCode;
use App\Models\Acesso;
use App\Services\CatracaService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AcessoController extends Controller
{
  
      public function verificar($uuid)
{
    $qr = QRCode::where('code', $uuid)->first();

    if ($qr && $qr->used_at === null) {
        $qr->used_at = now();
        $qr->save();

        // Aqui chama o Python (microserviço ou endpoint da catraca)
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ODM5QUY1QkFBQzo4MTlFQ0M4MTgzMUYyQw==',
                'Accept' => 'application/json, text/plain, */*',
                'User-Agent' => 'Mozilla/5.0',
                'Referer' => 'http://192.168.1.125/',
                'Connection' => 'keep-alive',
                'Cache-Control' => 'no-cache',
                'Pragma' => 'no-cache',
                'Host' => '192.168.1.125'
            ])->get('http://192.168.1.125/abreporta');

            if ($response->successful()) {
                return response()->json(['message' => 'Acesso liberado e catraca acionada'], 200);
            } else {
                return response()->json(['message' => 'Código válido, mas erro ao acionar a catraca'], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro na comunicação com a catraca: ' . $e->getMessage()], 500);
        }
    }

    return response()->json(['message' => 'Código inválido ou já utilizado'], 401);
}


    public function status($status)
    {
        return view('acesso.status', compact('status'));
    }
}

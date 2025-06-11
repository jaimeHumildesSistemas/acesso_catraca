<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CatracaService
{
  

    public function liberar()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json, text/plain, */*',
                'User-Agent' => 'Mozilla/5.0',
            ])->get($this->url);

            if ($response->successful()) {
                Log::info('✅ Catraca liberada com sucesso.');
                return true;
            } else {
                Log::error('❌ Erro ao liberar catraca: HTTP ' . $response->status());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('❌ Exceção ao liberar catraca: ' . $e->getMessage());
            return false;
        }
    }
}

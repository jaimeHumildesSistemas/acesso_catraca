<?php

namespace App\Services;

use App\Models\QRCode;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGen;

class QRCodeService
{
    /**
     * Gera um QR Code único para o usuário
     *
     * @param int $userId
     * @return array
     */
    public function gerarQRCodeParaUsuario(int $userId): array
    {
        // Gera um código UUID único
        $codigo = Str::uuid()->toString();

        // Cria o registro no banco
        $registro = QRCode::create([
            'user_id' => $userId,
            'code' => $codigo,
            'used_at' => null,
        ]);

        // Gera imagem do QR Code (base64 para exibir ou salvar)
        $imagemBase64 = base64_encode(
            QrCodeGen::format('png')->size(300)->generate($codigo)
        );

        return [
            'code' => $codigo,
            'image' => $imagemBase64,
            'registro' => $registro,
        ];
    }

    /**
     * Valida se o QR Code existe e não foi usado
     *
     * @param string $codigo
     * @return QRCode|null
     */
    public function validarQRCode(string $codigo): ?QRCode
    {
        $qr = QRCode::where('code', $codigo)->first();

        if (!$qr || $qr->used_at !== null) {
            return null;
        }

        return $qr;
    }
}

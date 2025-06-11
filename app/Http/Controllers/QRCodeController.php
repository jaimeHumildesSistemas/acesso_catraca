<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\QRCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
    public function index()
    {
        $qrcodes = QRCode::latest()->get();

        $totalQRCodes = $qrcodes->count();
        $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
        $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

        return view('qrcode.index', compact('qrcodes', 'totalQRCodes', 'qrcodesUsados', 'qrcodesDisponiveis'));
    }

  public function gerar()
{
    $codigo = Str::uuid()->toString();

    QRCode::create(['code' => $codigo]);

    $url = url('/api/catraca/verificar/' . $codigo);

    // Gera o QR code com a URL completa
    $qrCodeUrl = QrCodeGenerator::size(300)->generate($url);

    $qrcodes = QRCode::latest()->get();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

    return view('qrcode.index', compact('qrCodeUrl', 'qrcodes', 'totalQRCodes', 'qrcodesUsados', 'qrcodesDisponiveis'));
}



}

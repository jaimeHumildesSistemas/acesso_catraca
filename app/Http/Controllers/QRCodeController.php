<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\QRCode;
use App\Models\Produto;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
   public function index()
{
    $qrcodes = QRCode::with(['user', 'produto'])->latest()->get();
    $produtos = Produto::latest()->get();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

    return view('qrcode.index', compact(
        'qrcodes',
        'produtos',
        'totalQRCodes',
        'qrcodesUsados',
        'qrcodesDisponiveis'
    ));
}



public function gerar(Request $request)
{
    $codigo = Str::uuid()->toString();

    // Pega o ID do produto do formulário
    $produtoId = $request->input('produto_id');

    // Cria o QR Code associado ao usuário e ao produto
    $qrcode = new QRCode();
    $qrcode->code = $codigo;
    $qrcode->user_id = auth()->id();
    $qrcode->produto_id = $produtoId;
    $qrcode->save();
    // dd($qrcode); // Veja se foi salvo


    $url = url('/api/catraca/verificar/' . $codigo);

    $qrCodeUrl = QrCodeGenerator::size(300)->generate($url);

    $qrcodes = QRCode::latest()->get();
    $produtos = Produto::latest()->get();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

   return redirect()->route('qrcode')->with([
    'qrCodeUrl' => $qrCodeUrl,
    'totalQRCodes' => $totalQRCodes,
    'qrcodesUsados' => $qrcodesUsados,
    'qrcodesDisponiveis' => $qrcodesDisponiveis,
]);

}




}

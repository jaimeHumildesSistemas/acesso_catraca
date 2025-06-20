<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\QRCode;
use App\Models\Produto;
use App\Models\Filial;
use App\Models\FormaPagamento;  // ← Adicione isso
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
    public function index()
    {
        $qrcodes = QRCode::with(['user', 'produto', 'filial'])->latest()->get();
        $produtos = Produto::latest()->get();
        $filiais = Filial::all();
        $formasPagamento = FormaPagamento::all();  // ← Pegando as formas de pagamento

        $totalQRCodes = $qrcodes->count();
        $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
        $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

        return view('qrcode.index', compact(
            'qrcodes',
            'produtos',
            'filiais',
            'formasPagamento',  // ← Passando para o Blade
            'totalQRCodes',
            'qrcodesUsados',
            'qrcodesDisponiveis'
        ));
    }

    public function gerar(Request $request)
    {
        try {
            $request->validate([
                'idfilial' => 'required|integer|exists:filiais,id',
                'idproduto' => 'required|integer|exists:produtos,id',
                'valor' => 'required|numeric',
                'desconto' => 'nullable|numeric',
                'acrescimo' => 'nullable|numeric',
                'valorapagar' => 'required|numeric',
                'formadepagamento' => 'required|string|max:255',
            ]);

            $codigo = Str::uuid()->toString();

            $qrcode = new QRCode();
            $qrcode->code = $codigo;
            $qrcode->user_id = auth()->id();
            $qrcode->idfilial = $request->idfilial;
            $qrcode->idproduto = $request->idproduto;
            $qrcode->valor = $request->valor;
            $qrcode->desconto = $request->desconto ?? 0;
            $qrcode->acrescimo = $request->acrescimo ?? 0;
            $qrcode->valorapagar = $request->valorapagar;
            $qrcode->formadepagamento = $request->formadepagamento;
            $qrcode->status = 'pendente';
            $qrcode->save();

            $url = url('/api/catraca/verificar/' . $codigo);

            $qrCodeImage = '<img src="data:image/png;base64,' . base64_encode(
                QrCodeGenerator::format('png')->size(300)->generate($url)
            ) . '" />';

            return response()->json([
                'success' => true,
                'qrcode' => $qrCodeImage,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao gerar QR Code: ' . $e->getMessage()
            ], 500);
        }
    }

}

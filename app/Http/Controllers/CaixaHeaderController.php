<?php

namespace App\Http\Controllers;

use App\Models\CaixaHeader;
use App\Models\FluxoCaixa;
use App\Models\CaixaItem;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaixaHeaderController extends Controller
{
    public function index()
    {
        $fechamentos = CaixaHeader::with('fluxos')->orderBy('datahora_fechamento', 'desc')->get();
        return view('caixa_header.index', compact('fechamentos'));
    }

    public function show($id)
    {
        $caixa = CaixaHeader::with('fluxos')->findOrFail($id);
        return view('caixa_header.show', compact('caixa'));
    }

    public function abrir()
    {
        $filiais = Filial::all();
        $filialDefault = auth()->user()->idfilial ?? 1;
        return view('caixa_header.abrir', compact('filiais', 'filialDefault'));
    }

    public function abrirStore(Request $request)
    {
        // Validação incluindo que o idfilial exista na tabela filiais
        $request->validate([
            'valor_abertura' => 'required|numeric|min:0',
            'idfilial' => 'required|exists:filiais,id',
        ]);

        // Fecha caixa anterior aberto para o usuário
        CaixaHeader::where('iduser', auth()->id())
            ->whereNull('datahora_fechamento')
            ->update(['datahora_fechamento' => now()]);

        // Abre novo caixa
        CaixaHeader::create([
            'idfilial' => $request->idfilial,
            'iduser' => auth()->id(),
            'datahora_abertura' => now(),
            'valor_abertura' => $request->valor_abertura,
            'total_bruto' => 0,
            'total_desconto' => 0,
            'total_acrescimo' => 0,
            'total_liquido' => 0,
        ]);

        return redirect()->route('caixa_header.index')->with('success', 'Caixa aberto com sucesso!');
    }
    public function fechar()
    {
        $caixa = CaixaHeader::where('iduser', auth()->id())
            ->whereNull('datahora_fechamento')
            ->latest()
            ->first();

        if (!$caixa) {
            return redirect()->back()->with('error', 'Nenhum caixa aberto.');
        }

        $itens = CaixaItem::where('iduser', auth()->id())
            ->where('datetime', '>=', $caixa->datahora_abertura)
            ->get();

        $totalBruto = $itens->sum('valor');
        $totalDesconto = $itens->sum('desconto');
        $totalAcrescimo = $itens->sum('acrescimo');

        $valorFechamento = $caixa->valor_abertura + $totalBruto + $totalAcrescimo - $totalDesconto;

        $totaisPorForma = $itens->groupBy('formadepagamento')->map->sum('valorapagar');

        return view('caixa_header.fechar', compact(
            'caixa',
            'totalBruto',
            'totalDesconto',
            'totalAcrescimo',
            'valorFechamento',
            'totaisPorForma'
        ));
    }

    public function fecharStore(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:caixa_header,id',
            'total_bruto' => 'required|numeric',
            'total_desconto' => 'required|numeric',
            'total_acrescimo' => 'required|numeric',
            'total_liquido' => 'required|numeric',
        ]);

        $caixa = CaixaHeader::findOrFail($request->id);

        $caixa->update([
            'datahora_fechamento' => now(),
            'total_bruto' => $request->total_bruto,
            'total_desconto' => $request->total_desconto,
            'total_acrescimo' => $request->total_acrescimo,
            'total_liquido' => $request->total_liquido,
        ]);

        FluxoCaixa::create([
            'iduser' => auth()->id(),
            'idfilial' => $caixa->idfilial,
            'tipo' => 'credito',
            'valor' => $request->total_liquido,
            'descricao' => 'Fechamento de Caixa #' . $caixa->id,
            'datahora' => now(),
        ]);

        return redirect()->route('caixa_header.index')->with('success', 'Caixa fechado com sucesso.');
    }
}

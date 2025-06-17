<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
    {
        // Carrega também o nome dos usuários criador e atualizador
        $produtos = Produto::with(['userCriador', 'userAtualizador'])->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        Produto::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'user_ins' => Auth::id(),
            'data_ins' => now(),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'user_upd' => Auth::id(),
            'data_upd' => now(),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    public function index()
    {
        $formas = FormaPagamento::all();
        return view('formapagamento.index', compact('formas'));
    }

    public function create()
    {
        return view('formapagamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        FormaPagamento::create([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('formapagamento.index')->with('success', 'Forma de pagamento criada com sucesso!');
    }

    public function edit($id)
    {
        $forma = FormaPagamento::findOrFail($id);
        return view('formapagamento.edit', compact('forma'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        $forma = FormaPagamento::findOrFail($id);
        $forma->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('formapagamento.index')->with('success', 'Forma de pagamento atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $forma = FormaPagamento::findOrFail($id);
        $forma->delete();

        return redirect()->route('formapagamento.index')->with('success', 'Forma de pagamento excluída com sucesso!');
    }
}

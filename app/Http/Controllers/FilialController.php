<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function index()
    {
        $filiais = Filial::paginate(10);
        return view('filiais.index', compact('filiais'));
    }

    public function create()
    {
        return view('filiais.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomedafilial' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'nun_end' => 'required|string|max:20',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|size:2',
            'cep' => 'required|string|max:20',
        ]);

        Filial::create($validated);

        return redirect()->route('filiais.index')->with('success', 'Filial criada com sucesso!');
    }

    public function show(Filial $filial)
    {
        return view('filiais.show', compact('filial'));
    }

    public function edit(Filial $filial)
    {
        return view('filiais.edit', compact('filial'));
    }

    public function update(Request $request, Filial $filial)
    {
        $validated = $request->validate([
            'nomedafilial' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'nun_end' => 'required|string|max:20',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|size:2',
            'cep' => 'required|string|max:20',
        ]);

        $filial->update($validated);

        return redirect()->route('filiais.index')->with('success', 'Filial atualizada com sucesso!');
    }

    public function destroy(Filial $filial)
    {
        $filial->delete();

        return redirect()->route('filiais.index')->with('success', 'Filial removida com sucesso!');
    }
}

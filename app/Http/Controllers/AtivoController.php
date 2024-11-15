<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ativo;

class AtivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ativos = Ativo::all();
        return view('ativos.index', compact('ativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
            'data_aquisicao' => 'nullable|date',
        ]);

        $ativo = new Ativo();
        $ativo->nome = $request->nome;
        $ativo->descricao = $request->descricao;
        $ativo->valor = $request->valor;
        $ativo->data_aquisicao = $request->data_aquisicao;
        $ativo->save();

        return redirect()->route('ativos.index')->with('success', 'Ativo cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $ativo = Ativo::findOrFail($id);
        return view('ativos.show', compact('ativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ativo = Ativo::findOrFail($id);
        return view('ativos.edit', compact('ativo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
            'data_aquisicao' => 'nullable|date',
        ]);

        $ativo = Ativo::findOrFail($id);
        $ativo->nome = $request->nome;
        $ativo->descricao = $request->descricao;
        $ativo->valor = $request->valor;
        $ativo->data_aquisicao = $request->data_aquisicao;
        $ativo->save();

        return redirect()->route('ativos.index')->with('success', 'Ativo atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ativo = Ativo::findOrFail($id);
        $ativo->delete();

        return redirect()->route('ativos.index')->with('success', 'Ativo removido com sucesso!');
    }
}

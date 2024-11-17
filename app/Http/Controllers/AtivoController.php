<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ativo;
use Illuminate\Container\Attributes\Auth;

class AtivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtém apenas os ativos pertencentes ao usuário autenticado
        $ativos = Ativo::where('user_id', auth()->id())->get();
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

        // Cria o ativo associado ao usuário autenticado
        Ativo::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data_aquisicao' => $request->data_aquisicao,
            'user_id' => auth()->id(), // Garantindo que o user_id seja definido
        ]);

        return redirect()->route('ativos.index')->with('success', 'Ativo cadastrado com sucesso!');
    }


    public function show(string $id)
    {
        $ativo = Ativo::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('ativos.show', compact('ativo'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ativo = Ativo::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('ativos.edit', compact('ativo'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ativo = Ativo::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
            'data_aquisicao' => 'nullable|date',
        ]);

        $ativo->update($request->only(['nome', 'descricao', 'valor', 'data_aquisicao']));

        return redirect()->route('ativos.index')->with('success', 'Ativo atualizado com sucesso!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ativo = Ativo::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $ativo->delete();

        return redirect()->route('ativos.index')->with('success', 'Ativo removido com sucesso!');
    }
}

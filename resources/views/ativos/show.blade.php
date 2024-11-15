@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Detalhes do Ativo</h1>
    <div class="card">
        <div class="card-header">
            {{ $ativo->nome }}
        </div>
        <div class="card-body">
            <p><strong>Descrição:</strong> {{ $ativo->descricao }}</p>
            <p><strong>Valor:</strong> R$ {{ $ativo->valor }}</p>
            <p><strong>Data de Aquisição:</strong> {{ $ativo->data_aquisicao }}</p>
        </div>
    </div>
    <a href="{{ route('ativos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

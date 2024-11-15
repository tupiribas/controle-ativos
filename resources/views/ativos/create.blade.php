@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Novo Ativo</h1>
    <form action="{{ route('ativos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_aquisicao" class="form-label">Data de Aquisição</label>
            <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection

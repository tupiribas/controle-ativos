@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Ativo</h1>
    <form action="{{ route('ativos.update', $ativo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $ativo->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ $ativo->descricao }}</textarea>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ $ativo->valor }}" required>
        </div>
        <div class="mb-3">
            <label for="data_aquisicao" class="form-label">Data de Aquisição</label>
            <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control" value="{{ $ativo->data_aquisicao }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection

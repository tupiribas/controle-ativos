@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Ativos</h1>
    <a href="{{ route('ativos.create') }}" class="btn btn-primary mb-3">Adicionar Ativo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data de Aquisição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ativos as $ativo)
            <tr>
                <td>{{ $ativo->id }}</td>
                <td>{{ $ativo->nome }}</td>
                <td>{{ $ativo->descricao }}</td>
                <td>{{ $ativo->valor }}</td>
                <td>{{ $ativo->data_aquisicao }}</td>
                <td>
                    <a href="{{ route('ativos.show', $ativo->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('ativos.edit', $ativo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ativos.destroy', $ativo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

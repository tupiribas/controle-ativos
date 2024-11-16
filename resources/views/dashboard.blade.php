@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    <div class="card">
        <div class="card-header">
            Gráfico de Ativos
        </div>
        <div class="card-body">
            <canvas id="ativosChart" width="400" height="200">
                Seu navegador não suporta gráficos.
            </canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = @json($data); // Converte os dados para uso em JS

        const labels = data.map(item => `Mês ${item.mes}`);
        const valores = data.map(item => item.total);

        const ctx = document.getElementById('ativosChart').getContext('2d');
        const ativosChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Valor dos Ativos',
                    data: valores,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
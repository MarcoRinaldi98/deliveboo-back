@extends('layouts.admin')

@section('page-title', 'Statistiche Ordini')

@section('content')
    <div class="container pt-5 content-container mt-5">
        <canvas id="orderChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('orderChart').getContext('2d');
        var chartData = {!! json_encode($chartData) !!};

        var labels = Object.keys(chartData);
        var data = Object.values(chartData).map(function(value) {
            return value.total;
        });
        var amountData = Object.values(chartData).map(function(value) {
            return value.amount;
        });

        var config = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Ordini',
                    data: data,
                    borderColor: 'rgba(255, 0, 0, 1)',
                    backgroundColor: 'rgba(255, 0, 0, 0.5)',
                    borderWidth: 2,
                    borderRadius: Number.MAX_VALUE,
                    borderSkipped: false,
                },
                {
                    label: 'Totale',
                    data: amountData,
                    borderColor: 'rgba(0, 0, 255, 1)',
                    backgroundColor: 'rgba(0, 0, 255, 0.5)',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    suggestedMax: Math.max(Math.max(...data), Math.max(...amountData)) * 1.1,
                },
            },
        },
    };

        new Chart(ctx, config);
    </script>
@endsection

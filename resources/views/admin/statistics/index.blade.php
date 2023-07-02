@extends('layouts.admin')

@section('content')
    <div class="container">
        <canvas id="orderChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('orderChart').getContext('2d');
        var chartData = {!! json_encode($chartData) !!};

        var labels = Object.keys(chartData);
        var data = Object.values(chartData).map(function (value) {
            return value.total;
        });
        var amountData = Object.values(chartData).map(function (value) {
            return value.amount;
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ordini',
                    data: data,
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }, {
                    label: 'Totale',
                    data: amountData,
                    backgroundColor: 'rgba(255, 255, 0, 0.2)',
                    borderColor: 'rgba(255, 255, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
@extends('layouts.template')

@section('content')
    <div class="card" style="max-width: 500px; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">Halo, apakabar !!!</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <h4 class="card-subtitle mb-2 text-muted">Jumlah Barang</h4>
            Selamat datang semua. Ini adalah halaman pertama.
            <canvas id="barangChart" width="300" height="300"></canvas>
        </div>
    </div>

    <!-- Memuat library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script untuk membuat grafik -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('barangChart').getContext('2d');
            var barangChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Barang'],
                    datasets: [{
                        label: 'Jumlah Barang',
                        data: [{{ $jumlahBarang }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Jumlah Barang'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection

@extends('layouts.template')

@section('content')
    <div class="card" style="max-width: 500px; margin: auto; float: left;">
        <div class="card-body">
            <h4 class="card-subtitle mb-2 text-muted">Jumlah Peminjaman Ruangan</h4>
            <form id="filterForm">
                <label for="week">Pilih Minggu :</label>
                <input type="week" id="week" name="week" value="{{ $selectedWeek }}">
                <button type="submit">Filter</button>
            </form>
            <canvas id="pinjamRuangChart" width="300" height="300"></canvas>
        </div>
    </div>

    <!-- Memuat library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script untuk membuat grafik -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('pinjamRuangChart').getContext('2d');
            var pinjamRuangChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!}, // Use labels from controller
                    datasets: [{
                        label: 'Jumlah',
                        data: {!! json_encode($jumlahPinjamRuang) !!}, // Use data from controller
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
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            }
                        }
                    }
                }
            });

            document.getElementById('filterForm').addEventListener('submit', function(event) {
                event.preventDefault();
                var week = document.getElementById('week').value;
                window.location.href = '?week=' + week;
            });
        });
    </script>
@endsection

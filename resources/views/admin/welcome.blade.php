@extends('layouts.template')

@section('content')
    <div style="display: flex; justify-content: center; max-width: 1500px; margin: auto; gap: 10px;">
        <div class="card" style="max-width: 450px; margin: 0;">
            <div class="card-body">
                <h4 class="card-subtitle mb-2 text-muted">Jumlah Peminjaman Ruangan</h4>
                <form id="filterFormRuang">
                    <label for="weekRuang">Pilih Minggu :</label>
                    <input type="week" id="weekRuang" name="weekRuang" value="{{ $selectedWeekRuang }}">
                    <button type="submit">Filter</button>
                </form>
                <canvas id="pinjamRuangChart" width="300" height="300"></canvas>
            </div>
        </div>

        <div class="card" style="max-width: 450px; margin: 0;">
            <div class="card-body">
                <h4 class="card-subtitle mb-2 text-muted">Jumlah Peminjaman Barang</h4>
                <form id="filterFormBarang">
                    <label for="weekBarang">Pilih Minggu :</label>
                    <input type="week" id="weekBarang" name="weekBarang" value="{{ $selectedWeekBarang }}">
                    <button type="submit">Filter</button>
                </form>
                <canvas id="pinjamBarangChart" width="300" height="300"></canvas>
            </div>
        </div>

        <div class="card" style="max-width: 450px; margin: 0;">
            <div class="card-body">
                <h4 class="card-subtitle mb-2 text-muted">Jumlah Pengguna</h4>
                <form id="filterFormUser">
                    <label for="year">Pilih Angkatan :</label>
                    <input type="number" id="year" name="year" value="{{ $selectedYear }}" min="2020" max="{{ date('Y') }}">
                    <button type="submit">Filter</button>
                </form>
                <canvas id="userChart" width="300" height="300"></canvas>
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: center; max-width: 1500px; margin: auto; gap: 10px;">
    <div class="card" style="max-width: 450px; margin: 10px auto;">
        <div class="card-body">
            <h4 class="card-subtitle mb-2 text-muted">Jumlah Barang</h4>
            <canvas id="jumlahBarangChart" width="300" height="300"></canvas>
        </div>
    </div>
</div>

    <!-- Memuat library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script untuk membuat grafik -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctxRuang = document.getElementById('pinjamRuangChart').getContext('2d');
            var pinjamRuangChart = new Chart(ctxRuang, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($roomLabels) !!}, // Use room labels from controller
                    datasets: [{
                        label: 'Jumlah',
                        data: {!! json_encode($roomData) !!}, // Use room data from controller
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

            var ctxBarang = document.getElementById('pinjamBarangChart').getContext('2d');
            var pinjamBarangChart = new Chart(ctxBarang, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($itemLabels) !!}, // Use item labels from controller
                    datasets: [{
                        label: 'Jumlah',
                        data: {!! json_encode($itemData) !!}, // Use item data from controller
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
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

            var ctxUser = document.getElementById('userChart').getContext('2d');
            var userChart = new Chart(ctxUser, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($majorLabels) !!}, // Use major labels from controller
                    datasets: [{
                        label: 'Jumlah',
                        data: {!! json_encode($majorData) !!}, // Use major data from controller
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)'
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

            // Script for total items chart
            var ctxJumlahBarang = document.getElementById('jumlahBarangChart').getContext('2d');
            var jumlahBarangChart = new Chart(ctxJumlahBarang, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($itemCountLabels) !!}, // Use item count labels from controller
                    datasets: [{
                        label: 'Jumlah',
                        data: {!! json_encode($itemCountData) !!}, // Use item count data from controller
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)'
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
                            max: 60,
                            ticks: {
                                stepSize: 10,
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
        });
    </script>
@endsection

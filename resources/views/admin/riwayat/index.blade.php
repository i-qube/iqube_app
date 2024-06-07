@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div>
            <h3></h3>
            <h3></h3>
        </div>
        <!-- Toggle button -->
        <div class="toggle-button-container">
            <div id="toggle-button-left" class="toggle-button" data-value="peminjaman_barang">Peminjaman Barang</div>
            <div id="toggle-button-right" class="toggle-button" data-value="peminjaman_ruangan">Peminjaman Ruangan</div>
        </div>
        @push('css')
            <style>
                .toggle-button-container {
                    display: flex;
                    overflow: hidden;
                    border: 1px solid #ccc;
                    border-radius: 20px;
                    width: 500px;
                    margin: auto;
                }

                .toggle-button {
                    flex: 1;
                    padding: 10px;
                    text-align: center;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }

                .toggle-button:hover {
                    background-color: #2612d8d2;
                }

                #toggle-button-left {
                    border-radius: 20px 0 0 20px;
                }

                #toggle-button-right {
                    border-radius: 0 20px 20px 0;
                }
            </style>
        @endpush

        <div id="pinjam_barang_card" class="hide">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>
            <div class="card-body">
                <button id="exportButton" class="btn btn-primary mb-3">Export to Excel</button>
                <table id="table_peminjaman_barang" class="table-bordered table-striped table-hover table-sm table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Nama Item</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pemakaian</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div id="pinjam_ruangan_card" class="hide">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>
            <div class="card-body w-full">
                <table id="table_peminjaman_ruangan" class="table-bordered table-striped table-hover table table-full">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Nama Ruangan</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var currentTable = 'none';
            $('.toggle-button').val('peminjaman_barang');

            let value = $('.toggle-button').data('value');

            if (value === 'peminjaman_barang') {
                $('#pinjam_barang_card').show();
                $('#pinjam_ruangan_card').hide();
                currentTable = 'peminjaman_barang';
            } else if (value === 'peminjaman_ruangan') {
                $('#pinjam_barang_card').hide();
                $('#pinjam_ruangan_card').show();
                currentTable = 'peminjaman_ruangan';
            }

            $('.toggle-button').click(function() {
                var value = $(this).data('value');

                // Handle your toggle logic here
                if (value === 'peminjaman_barang') {
                    $('#pinjam_barang_card').show();
                    $('#pinjam_ruangan_card').hide();
                    currentTable = 'peminjaman_barang';
                } else if (value === 'peminjaman_ruangan') {
                    $('#pinjam_barang_card').hide();
                    $('#pinjam_ruangan_card').show();
                    currentTable = 'peminjaman_ruangan';
                }

                // Tambahkan dan hapus kelas .active
                $('.toggle-button').removeClass('active');
                $(this).addClass('active');
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataPeminjamanBarang = $('#table_peminjaman_barang').DataTable({
                serverSide: true,
                processing: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url('riwayat/listBarang') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": function(d) {
                        d.peminjaman_barang_id = $('#peminjaman_barang_id').val();
                    }
                },
                columns: [{
                    data: "peminjaman_barang_id",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "no_induk",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user.nama",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user.kelas",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "item.item_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "jumlah",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "date_borrow",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#peminjaman_barang_id').on('change', function() {
                dataPeminjamanBarang.ajax.reload();
            });

            // Add export button click event
            $('#exportButton').click(function() {
                var month = prompt("Enter month (01-12):", new Date().getMonth() + 1);
                var year = prompt("Enter year (YYYY):", new Date().getFullYear());
                if (month && year) {
                    window.location.href = '/export?month=' + month + '&year=' + year;
                }
            });

            var dataPeminjamanRuangan = $('#table_peminjaman_ruangan').DataTable({
                serverSide: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url('riwayat/listRuangan') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": function(d) {
                        d.peminjaman_ruangan_id = $('#peminjaman_ruangan_id').val();
                        d.status = 'Complete';
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "no_induk",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user.nama",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user.kelas",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "room.room_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "date_borrow",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "start_time",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "end_time",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row) {
                        if (row.status === 'Not Complete') {
                            return '<button class="btn btn-danger btn-change-status" data-id="' +
                                row.peminjaman_ruangan_id + '">Not Complete</button>';
                        } else if (row.status === 'Complete') {
                            return '<button class="btn btn-success" disabled>Complete</button>';
                        } else {
                            return '<button class="btn btn-primary" disabled>' + row.status +
                                '</button>';
                        }
                    }
                }]
            });
            $('#peminjaman_ruangan_id').on('change', function() {
                dataPeminjamanRuangan.ajax.reload();
            });

        });
    </script>
@endpush

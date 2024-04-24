@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div>
            <h3></h3>
            <h3></h3>
        </div>
        <!-- Toggle button -->
        <div class="toggle-button-container">
            <div id="toggle-button-left" class="toggle-button">Peminjaman Barang</div>
            <div id="toggle-button-right" class="toggle-button">Peminjaman Ruangan</div>
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
                    background-color: #3e2ddbd2;
                }

                #toggle-button-left {
                    border-radius: 20px 0 0 20px;
                }

                #toggle-button-right {
                    border-radius: 0 20px 20px 0;
                }
            </style>
        @endpush
        <div>
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>
            <div class="card-body">
                <div id="table_peminjaman_barang" class="table-bordered table-striped table-hover table-sm table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Item ID</th>
                            <th>Kelas</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pemakaian</th>
                        </tr>
                    </thead>
                </div>
            </div>
        </div>

        <div>
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>
            <div class="card-body">
                <table id="table_peminjaman_ruangan" class="table-bordered table-striped table-hover table-sm table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>ID Ruangan</th>
                            <th>Kelas</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Button Status</th>
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

            $('#toggle-button-left').click(function() {
                if (currentTable !== 'peminjaman_barang') {
                    $('#table_peminjaman_barang').show();
                    $('#table_peminjaman_ruangan').hide();
                    currentTable = 'peminjaman_barang';
                }
            });

            $('#toggle-button-right').click(function() {
                if (currentTable !== 'peminjaman_ruangan') {
                    $('#table_peminjaman_barang').hide();
                    $('#table_peminjaman_ruangan').show();
                    currentTable = 'peminjaman_ruangan';
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataPeminjamanBarang = $('#table_peminjaman_barang').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('pinjam/list/barang') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.peminjaman_barang_id = $('#peminjaman_barang_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "peminjaman_barang_id",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nim",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "item_id",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "class",
                    className: "",
                    orderable: false,
                    searchable: false
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
                }, {
                    data: "date_return",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#peminjaman_barang_id').on('change', function() {
                dataPeminjamanBarang.ajax.reload();
            });

            var dataPeminjamanRuangan = $('#table_peminjaman_ruangan').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('pinjam/list/ruangan') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.peminjaman_ruangan_id = $('#peminjaman_ruangan_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nim",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "room_id",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "class",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "date_borrow",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "date_return",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#peminjaman_ruangan_id').on('change', function() {
                dataPeminjamanRuangan.ajax.reload();
            });
        });
    </script>
@endpush

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div>
            <h3></h3>
        </div>
        <!-- Toggle button -->
        <div class="toggle-button-container">
            <div id="toggle-button-left" class="toggle-button">Peminjaman Barang</div>
            <div id="toggle-button-right" class="toggle-button">Peminjaman Ruangan</div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter: </label>
                        <div class="col-3">
                            <select class="form-control" name="peminjaman_barang_id" id="peminjaman_barang_id" required>
                                <option value="">-- Semua --</option>
                                @foreach ($peminjaman as $i)
                                    <option value="{{ $i->peminjaman_barang_id }}">{{ $i->user_name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Peminjam</small>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tabel_peminjaman_barang" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">{{ $page->title }}</h3>
                </div>
                <div class="card-body">
                    <table class="table-bordered table-striped table-hover table-sm table" id="tabel_peminjaman_barang">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Admin</th>
                                <th>Nama User</th>
                                <th>Nama Item</th>
                                <th>Kelas</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pemakaian</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="tabel_peminjaman_ruangan" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">{{ $page->title }}</h3>
                </div>
                <div class="card-body">
                    <table class="table-bordered table-striped table-hover table-sm table" id="tabel_peminjaman_barang">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Admin</th>
                                <th>Nama User</th>
                                <th>Nama Item</th>
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
    </div>
@endsection

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

@push('js')
    <script>
        $(document).ready(function() {
            var currentTable = 'none';

            $('#toggle-button-left').click(function() {
                if (currentTable !== 'peminjaman_barang') {
                    $('#tabel_peminjaman_barang').show();
                    $('#tabel_peminjaman_ruangan').hide();
                    currentTable = 'peminjaman_barang';
                }
            });

            $('#toggle-button-right').click(function() {
                if (currentTable !== 'peminjaman_ruangan') {
                    $('#tabel_peminjaman_barang').hide();
                    $('#tabel_peminjaman_ruangan').show();
                    currentTable = 'peminjaman_ruangan';
                }
            });

            var dataPeminjamanBarang = $('#table_peminjaman_barang').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('pinjam/list') }}",
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
                    data: "admin_name",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "item_name",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "class",
                    className: "",
                    orderable: false,
                    searchable: false
                },  {
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

            var dataPeminjamanRuangan = $('#table_peminjaman_ruangan').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('pinjam/list_ruangan') }}",
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
                    data: "peminjaman_ruangan_id",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "admin_name",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "room_name",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "user_name",
                    className: "",
                    orderable: true,
                    searchable: true
                },  {
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

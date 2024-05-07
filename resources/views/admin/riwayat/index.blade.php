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
<<<<<<< HEAD
                    background-color: #2612d8d2;
=======
                    background-color: #3e2ddbd2;
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
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
                <table id="table_peminjaman_barang" class="table-bordered table-striped table-hover table-sm table">
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
                </table>
            </div>
        </div>

        <div id="pinjam_ruangan_card" class="hide">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
            </div>
            <div class="card-body w-full">
                <table id="table_peminjaman_ruangan" class="table-bordered table-striped table-hover  table table-full">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIM</th>
<<<<<<< HEAD
                            <th>Nama</th>
                            <th>ID Ruangan</th>
                            <th>Kelas</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
=======
                            <th>ID Ruangan</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
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
<<<<<<< HEAD
                    "url": "{{ url('riwayat/listBarang') }}",
                    "dataType": "json",
                    "type": "GET",
=======
                    "url": "{{ url('pinjam/list/barang') }}",
                    "dataType": "json",
                    "type": "POST",
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                    "data": function(d) {
                        d.peminjaman_barang_id = $('#peminjaman_barang_id').val();
                    }
                },
                columns: [{
                    data: "peminjaman_barang_id",
                    className: "text-center",
<<<<<<< HEAD
                    orderable: false,
                    searchable: false
=======
                    orderable: true,
                    searchable: true
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
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
<<<<<<< HEAD
=======
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                }]
            });

            $('#peminjaman_barang_id').on('change', function() {
                dataPeminjamanBarang.ajax.reload();
            });

            var dataPeminjamanRuangan = $('#table_peminjaman_ruangan').DataTable({
                serverSide: true,
                autoWidth: false,
                ajax: {
<<<<<<< HEAD
                    "url": "{{ url('riwayat/listRuangan') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": function(d) {
                        d.peminjaman_ruangan_id = $('#peminjaman_ruangan_id').val();
                        d.status = 'Complete';
=======
                    "url": "{{ url('pinjam/list/ruangan') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.peminjaman_ruangan_id = $('#peminjaman_ruangan_id').val();
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
<<<<<<< HEAD
                    data: "nim",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama",
                    className: "",
                    orderable: false,
                    searchable: false
=======
                    data: "nama",
                    className: "",
                    orderable: true,
                    searchable: true
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                }, {
                    data: "room_id",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
<<<<<<< HEAD
                    data: "class",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
=======
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                    data: "date_borrow",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "date_return",
                    className: "",
                    orderable: false,
                    searchable: false
<<<<<<< HEAD
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
=======
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                }]
            });
            $('#peminjaman_ruangan_id').on('change', function() {
                dataPeminjamanRuangan.ajax.reload();
            });
<<<<<<< HEAD

        });
    </script>
@endpush
=======
        });
    </script>
@endpush

>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37

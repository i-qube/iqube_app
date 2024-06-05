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
                            <th>Kelas</th>
                            <th>Nama Barang</th>
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
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
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

                // Toggle logic 
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
                    "url": "{{ url('pinjam/list/barang') }}",
                    "dataType": "json",
                    "type": "POST",
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
                    data: "nim",
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
                },{
                    data: "item.item_name",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
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
                autoWidth: false,
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
                    orderable: true,
                    searchable: true
                },{
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
                    orderable: false,
                    searchable: false
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
                                row.peminjaman_ruangan_id + '"> Not Complete </button>';
                        } else if (row.status === 'Complete') {
                            return '<button class="btn btn-success" disabled> Complete </button>';
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

            // Tambahkan event listener untuk tombol di dalam tabel
            $('#table_peminjaman_ruangan').on('click', '.btn-change-status', function() {
                // Dapatkan ID peminjaman ruangan dari data atribut pada tombol
                var button = $(this);
                var peminjamanRuanganId = button.data('id');

                // Kirim permintaan AJAX untuk mengubah status
                $.ajax({
                    url: '{{ url('pinjam/change-status') }}', // Update to match your route
                    type: 'POST',
                    data: {
                        peminjaman_ruangan_id: peminjamanRuanganId,
                        _token: '{{ csrf_token() }}' // Sertakan token CSRF untuk validasi
                    },
                    success: function(response) {
                        // Tanggapan berhasil
                        if (response.success) {
                            // Hapus baris dari DataTable
                            dataPeminjamanRuangan.row(button.closest('tr')).remove().draw();
                        } else {
                            // Tanggapan gagal
                            console.error('Failed to update status.');
                        }
                    },
                    error: function(xhr) {
                        // Tanggapan error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush

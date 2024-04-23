@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
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
            <table class="table-bordered table-striped table-hover table-sm table" id="table_peminjaman_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Admin</th>
                        <th>Nama User</th>
                        <th>Nama Item</th>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataPeminjamanBarang = $('#table_peminjaman_barang').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('peminjaman/list') }}",
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
                    orderable: true,
                    searchable: true
                }, {
                    data: "admin_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "item_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "class",
                    className: "",
                    orderable: true,
                    searchable: true
                },  {
                    data: "jumlah",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "date_borrow",
                    className: "",
                    orderable: true,
                    searchable: true
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
        });
    </script>
@endpush

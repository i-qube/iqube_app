@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
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
                            <select class="form-control" name="item_id" id="item_id" required>
                                <option value="">-- Semua --</option>
                                @foreach ($item as $i)
                                    <option value="{{ $i->item_id }}">{{ $i->item_name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_item">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barang Nama</th>
                        <th>Nama Brand</th>
                        <th>Jumlah</th>
                        <th>Gambar</th>
                        <th>Tanggal diterima</th>
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
            var dataItem = $('#table_item').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.item_id = $('#item_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },{
                    data: "item_name",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "brand",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "item_qty",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "image",
                    render: function(data, type, row) {
                        return '<img src="{{ asset('storage/barang/') }}/' + row.image +
                            '" alt="Gambar Barang" style="max-height: 200px">';
                    },
                    className: "",
                    orderable: false,
                    searchable: false
                },{
                    data: "date_received",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#item_id').on('change', function() {
                dataItem.ajax.reload();
            });
        });
    </script>
@endpush
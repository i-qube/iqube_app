@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('ruangan/create') }}">Tambah</a>
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
                            <select class="form-control" name="room_floor" id="room_floor" required>
                                <option value="">-- Semua --</option>
                                @foreach ($room as $i)
                                    <option value="{{ $i->room_floor }}">{{ $i->room_floor }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Code Ruangan</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table-bordered table-striped table-hover table-sm table" id="table_room">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Lantai</th>
                        <th>Foto Ruangan</th>
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
            var dataRoom = $('#table_room').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('ruangan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.room_floor = $('#room_floor').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "room_code",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "room_name",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "room_floor",
                    className: "text-center",
                    orderable: true,
                    searchable: true
                }, {
                    data: "image",
                    render: function(data, type, row) {
                        return '<img src="{{ asset('storage/ruangan/') }}/' + row.image +
                            '" alt="Gambar RT1" style="max-height: 200px">';
                    },
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }]
            });
            $('#room_floor').on('change', function() {
                dataRoom.ajax.reload();
            });
        });
    </script>
@endpush

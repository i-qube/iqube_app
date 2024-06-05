@extends('layouts.template') @section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"> <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a> </div>
        </div>
        <div class="card-body">
            @if (@session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="kelas" name="kelas" required>
                                <option value="">- Semua -</option>
                                @foreach ($kelas as $i)
                                    <option value="{{$i->kelas}}">{{$i->kelas}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kelas Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No Induk Mahasiswa</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @endsection @push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_user').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('user/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d){
                        d.kelas = $('#kelas').val();
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
                    orderable: true,
                    searchable: true
                },{
                    data: "nama",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "jurusan",
                    className: "",
                    orderable: false,
                    searchable: false
                }, {
                    data: "angkatan",
                    className: "",
                    orderable: false,
                    searchable: false
                },{
                    data: "kelas",
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
            $('#kelas').on('change', function(){
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush

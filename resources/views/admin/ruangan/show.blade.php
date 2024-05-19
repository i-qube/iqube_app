@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($room)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $room->room_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Ruangan</th>
                        <td>{{ $room->room_code }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ruangan</th>
                        <td>{{ $room->room_name }}</td>
                    </tr>
                    <tr>
                        <th>Lantai</th>
                        <td>{{ $room->room_floor }}</td>
                    </tr>
                    <tr>
                        <th>Foto Ruangan</th>
                        <td>
                            @if($room->image)
                                <img src="{{ asset('storage/ruangan/' . $room->image) }}" alt="Gambar Ruangan" style="max-width: 500px; ">
                            @else
                                No Image Available
                            @endif
                        </td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('ruangan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
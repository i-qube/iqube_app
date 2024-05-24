@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($item)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->item_id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $item->item_name }}</td>
                    </tr>
                    <tr>
                        <th>Nama Brand</th>
                        <td>{{ $item->brand }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $item->item_qty }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diterima</th>
                        <td>{{ $item->date_received }}</td>
                    </tr>
                    <tr>
                        <th>Foto Barang</th>
                        <td>
                            @if ($item->image)
                                <img src="{{ asset('storage/barang/' . $item->image) }}" alt="Gambar Barang"
                                    style="max-width: 500px;">
                            @else
                                No Image Available
                            @endif
                        </td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush

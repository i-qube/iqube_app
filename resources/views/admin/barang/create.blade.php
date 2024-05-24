@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Nama Barang</label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="item_name" name="item_name"
                            value="{{ old('item_name') }}" required>
                        @error('item_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Nama Brand</label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}"
                            required>
                        @error('brand')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Jumlah</label>
                    <div class="col-9">
                        <input type="number" class="form-control" id="item_qty" name="item_qty"
                            value="{{ old('item_qty') }}" required>
                        @error('item_qty')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Foto Ruangan</label>
                    <div class="col-9">
                        <input type="file" class="form-control-file mt-2" id="image" name="image">
                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Tanggal Diterima</label>
                    <div class="col-9">
                        <input type="date" class="form-control" id="date_received" name="date_received"
                            value="{{ old('date_received') }}" required>
                        @error('date_received')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label"></label>
                    <div class="col-9">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush

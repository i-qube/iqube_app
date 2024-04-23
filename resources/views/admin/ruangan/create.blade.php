@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('ruangan') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Kode Ruangan </label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="room_id" name="room_id"
                            value="{{ old('room_id') }}" required>
                        @error('room_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Nama Ruangan</label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="room_code" name="room_code"
                            value="{{ old('room_code') }}" required>
                        @error('room_code')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Lantai</label>
                    <div class="col-9">
                        <input type="number" class="form-control" id="room_floor" name="room_floor"
                            value="{{ old('room_floor') }}" required>
                        @error('room_floor')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Foto Ruangan</label>
                    <div class="col-9">
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required style="border: none; padding: 0;">
                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>                              
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label"></label>
                    <div class="col-9">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('ruangan') }}">Kembali</a>
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
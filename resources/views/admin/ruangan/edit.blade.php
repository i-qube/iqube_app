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
                <a href="{{ url('ruangan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/ruangan/' . $room->room_id) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-3 control-label col-form-label">Kode Ruangan</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="room_code" name="room_code"
                                value="{{ old('room_code', $room->room_code) }}" required>
                            @error('room_code')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label col-form-label">Nama Ruangan</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="room_name" name="room_name"
                                value="{{ old('room_name', $room->room_name) }}" required>
                            @error('room_name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label col-form-label">Lantai</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="room_floor" name="room_floor"
                                value="{{ old('room_floor', $room->room_floor) }}" required>
                            @error('room_floor')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label col-form-label">Foto Ruangan</label>
                        <div class="col-9">
                            @if($room->image)
                            <img src="{{ asset($room->image) }}" alt="Foto Ruangan" style="max-width: 100px; max-height: 100px;">
                            <br>
                            @endif
                            <input type="file" class="form-control-file mt-2" id="image" name="image" accept="image/*">
                            @error('image')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('ruangan') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
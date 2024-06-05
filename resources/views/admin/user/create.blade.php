@extends('layouts.template') @section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('user') }}" class="form-horizontal"> @csrf <div class="form-group row"> <label
                        class="col-3 control-label col-form-label">Level</label>
                    <div class="col-9"> <select class="form-control" id="level_id" name="level_id" required>
                            <option value="">- Pilih Level -</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                            @endforeach
                        </select> @error('level_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">NIM</label>
                    <div class="col-9"> <input type="text" class="form-control" id="no_induk" name="no_induk"
                            value="{{ old('no_induk') }}" required> @error('no_induk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">Nama</label>
                    <div class="col-9"> <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama') }}" required> @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">Jurusan</label>
                    <div class="col-9"> <input type="text" class="form-control" id="jurusan" name="jurusan"
                            value="{{ old('jurusan') }}" required> @error('jurusan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">Angkatan</label>
                    <div class="col-9"> <input type="text" class="form-control" id="angkatan" name="angkatan"
                            value="{{ old('angkatan') }}" required> @error('angkatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">Kelas</label>
                    <div class="col-9"> <input type="text" class="form-control" id="kelas" name="kelas"
                            value="{{ old('kelas') }}" required> @error('kelas')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-3 control-label col-form-label">Password</label>
                    <div class="col-9"> <input type="password" class="form-control" id="password" name="password"
                            required> @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11"> <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <a
                            class="btn btn-sm btn-default ml-1" href="{{ url('user') }}">Kembali</a> </div>
                </div>
            </form>
        </div>
    </div>
    @endsection @push('css')
    @endpush @push('js')
@endpush

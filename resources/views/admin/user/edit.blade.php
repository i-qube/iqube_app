@extends('layouts.template') @section('content') <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body"> @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div> <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/user/' . $user->no_induk) }}" class="form-horizontal">
                    @csrf {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Level</label>
                        <div class="col-9"> <select class="form-control" id="level_id" name="level_id" required>
                                <option value="">- Pilih Level -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}" @if ($item->level_id == $user->level_id) selected @endif>
                                        {{ $item->level_name }}</option>
                                @endforeach
                            </select> @error('level_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">NIM</label>
                        <div class="col-9"> <input type="text" class="form-control" id="no_induk" name="no_induk"
                                value="{{ old('no_induk', $user->no_induk) }}" required> @error('no_induk')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Nama</label>
                        <div class="col-9"> <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $user->nama) }}" required> @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Jurusan</label>
                        <div class="col-9"> <input type="text" class="form-control" id="jurusan" name="jurusan"
                                value="{{ old('jurusan', $user->jurusan) }}" required> @error('jurusan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Angkatan</label>
                        <div class="col-9"> <input type="text" class="form-control" id="angkatan" name="angkatan"
                                value="{{ old('angkatan', $user->angkatan) }}" required> @error('angkatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Kelas</label>
                        <div class="col-9"> <input type="text" class="form-control" id="kelas" name="kelas"
                                value="{{ old('kelas', $user->kelas) }}" required> @error('kelas')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-3 control-label col-form-label">Password</label>
                        <div class="col-9"> <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @else
                                <small class="form-text text-muted">Abaikan (jangan diisi) jika tidak ingin mengganti password
                                    user.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"> <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11"> <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <a
                                class="btn btn-sm btn-default ml-1" href="{{ url('user') }}">Kembali</a> </div>
                    </div>
                </form>
            @endempty
        </div>
    </div> @endsection @push('css')
@endpush
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nameInput = document.getElementById('nama');
            var jurusanInput = document.getElementById('jurusan');
            var nimInput = document.getElementById('no_induk');
            var angkatanInput = document.getElementById('angkatan');

            nameInput.addEventListener('input', function() {
                this.value = this.value.replace(/\d+/g, '');
            });
            jurusanInput.addEventListener('input', function() {
                this.value = this.value.replace(/\d+/g, '');
            });
            nimInput.addEventListener('input', function() {
                this.value = this.value.replace(/[a-zA-Z]+/g, '');
            });
            angkatanInput.addEventListener('input', function() {
                this.value = this.value.replace(/[a-zA-Z]+/g, '');
            });
        });
    </script>
@endpush

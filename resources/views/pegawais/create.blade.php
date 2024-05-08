@extends('layouts.main')

@section('container')
<div class="card">
    <div class="col-lg-12 mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Entri Department</h1>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/pegawai">
                @csrf
                <div class="mb-2">
                    <label for="nama" class="form-label">Nip</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                        value="{{ old('nip') }}">
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="alamat"
                        value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                        value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Jenis Kelamin</label>
                    {{-- <input type="text" class="form-control @error('j_kelamin') is-invalid @enderror" name="j_kelamin"
                        value="{{ old('j_kelamin') }}"> --}}
                        <select class="form-control @error('j_kelamin') is-invalid @enderror" name="j_kelamin" id="j_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    @error('j_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Jabatan</label>
                    <select type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" name="id_jabatan">
                        value="{{ old('nama_jabatan') }}">
                        @foreach ($jabatan as $item)
                            @if (old('nama_jabatan') == $item->nama_jabatan)
                                <option value="{{ $item->id_jabatan }}" selected>{{ $item->nama_jabatan }}</option>
                            @else
                                <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}</option>
                            @endif
                        @endforeach
                    @error('nama_jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </select>
                </div>

                <div class="mb-2">
                    <label for="nama" class="form-label">Department</label>
                    <select type="text" class="form-control @error('nama_dept') is-invalid @enderror" name="id_dept">
                        @foreach ($department as $item)
                            @if (old('nama_dept') == $item->nama_dept)
                                <option value="{{ $item->id_dept }}">{{ $item->nama_dept }}</option>
                            @else
                                <option value="{{ $item->id_dept }}">{{ $item->nama_dept }}</option>
                            @endif
                        @endforeach
                        @error('nama_dept')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </select>
                </div>
                <div class="mb-2">

                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

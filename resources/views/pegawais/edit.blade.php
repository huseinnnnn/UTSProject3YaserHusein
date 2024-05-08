@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Pegawai</h1>
        </div>
        <form method="post" action="/pegawai/{{ $pegawai->nip }}">
            @method('PUT')
            @csrf
            <div class="mb-2">
                <label for="nama" class="form-label">Nip</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                    value="{{ $pegawai->nip, old('nip') }}">
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ $pegawai->nama, old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="alamat"
                    value="{{ $pegawai->alamat, old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                    value="{{ $pegawai->tgl_lahir, old('tgl_lahir') }}">
                @error('tgl_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control @error('j_kelamin') is-invalid @enderror" name="j_kelamin"
                    value="{{ $pegawai->j_kelamin, old('j_kelamin') }}">
                @error('j_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $pegawai->email, old('email') }}">
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
            {{-- <div class="mb-2">
        <label for="nama" class="form-label">Gaji Pokok</label>
        <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" value="{{ $jabatan->gaji_pokok, old('gaji_pokok')}}">
        @error('gaji_pokok')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div> --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

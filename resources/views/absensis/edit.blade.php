@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Absensi</h1>
        </div>
        <form method="post" action="{{ route('absensi.update', $absensi->id_absensi) }}">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="nama" class="form-label">Nip</label>
                <input name="nip" class="form-control" value="{{ $absensi->nip }}" readonly />
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Jam Masuk</label>
                <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror" name="jam_masuk"
                    value="{{ old('jam_masuk', $absensi->jam_masuk) }}">
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="nama" class="form-label">Jam Keluar</label>
                <input type="time" class="form-control @error('jam_keluar') is-invalid @enderror" name="jam_keluar"
                    value="{{ old('jam_keluar', $absensi->jam_keluar) }}">
                @error('jam_keluar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" href="{{ route('absensi.index') }}">Cancel</a>
        </form>
    </div>
@endsection

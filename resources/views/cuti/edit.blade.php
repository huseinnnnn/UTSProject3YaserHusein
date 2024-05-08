@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Cuti</h1>
        </div>
        <form method="post" action="{{ route('cuti.update', $data->id_cuti) }}">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="nip" class="form-label">NIP</label>
                <input name="nip" class="form-control" id="nip" value="{{ $data->nip }}" readonly />
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" id="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror"
                    name="tgl_mulai" value="{{ old('tgl_mulai', $data->tgl_mulai) }}">
                @error('tgl_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" id="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror"
                    name="tgl_selesai" value="{{ old('tgl_selesai', $data->tgl_selesai) }}">
                @error('tgl_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                <input type="text" class="form-control @error('jenis_cuti') is-invalid @enderror" name="jenis_cuti"
                    value="{{ old('jenis_cuti', $data->jenis_cuti) }}">
                @error('jenis_cuti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                    name="keterangan" value="{{ old('keterangan', $data->keterangan) }}">
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

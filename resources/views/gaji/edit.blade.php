@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Gaji</h1>
        </div>
        <form method="post" action="{{ route('gaji.update', $gaji->id_gaji) }}">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="nopeg" class="form-label">Nopeg</label>
                <input name="nopeg" class="form-control" value="{{ $gaji->nopeg }}" readonly />
                @error('nopeg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tgl_gaji" class="form-label">Tanggal</label>
                <input type="date" id="tgl_gaji" class="form-control @error('tgl_gaji') is-invalid @enderror"
                    name="tgl_gaji" value="{{ old('tgl_gaji', $gaji->tgl_gaji) }}">
                @error('tgl_gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji"
                    value="{{ old('gaji', $gaji->gaji) }}">
                @error('gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tunjangan" class="form-label">tunjangan</label>
                <input type="number" id="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror"
                    name="tunjangan" value="{{ old('tunjangan', $gaji->tunjangan) }}" placeholder="%">
                @error('tunjangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="route('gaji.index')" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

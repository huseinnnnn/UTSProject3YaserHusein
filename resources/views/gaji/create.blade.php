@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gaji</h1>
        </div>
        <form method="post" action="{{ route('gaji.store') }}">
            @csrf
            <div class="mb-2">
                <label for="nip" class="form-label">Nip</label>
                <select name="nip" id="nip" class="form-control">
                    <option value="">---</option>
                    @foreach ($pegawai as $item)
                        <option value="{{ $item->nip }}">{{ $item->nip }}</option>
                    @endforeach
                </select>
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tgl_gaji" class="form-label">Tanggal</label>
                <input type="date" id="tgl_gaji" class="form-control @error('tgl_gaji') is-invalid @enderror" name="tgl_gaji"
                    value="{{ old('tgl_gaji') }}">
                @error('tgl_gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji"
                    value="{{ old('gaji') }}">
                @error('gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tunjangan" class="form-label">tunjangan</label>
                <input type="number" id="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" name="tunjangan"
                    value="{{ old('tunjangan') }}" placeholder="%">
                @error('tunjangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

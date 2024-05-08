@extends('layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Entri Department</h1>
</div>
<form method="post" action="/department">
    @csrf
    <div class="mb-2">
      <label for="nama" class="form-label">Nama Department</label>
      <input type="text" class="form-control @error('nama_dept') is-invalid @enderror" name="nama_dept" value="{{ old('nama_dept')}}">
      @error('nama_dept')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    {{-- <div class="mb-2">
        <label for="nama" class="form-label">Gaji Pokok</label>
        <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" value="{{ old('gaji_pokok')}}">
        @error('gaji_pokok')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div> --}}
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

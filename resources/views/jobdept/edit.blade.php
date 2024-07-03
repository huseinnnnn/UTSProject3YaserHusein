@extends('layouts.main')

@section('container')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">JobDept</h1>
        </div>
        <form method="post" action="{{ route('jobdept.update', $data->id_jobdept) }}">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="nopeg" class="form-label">Nopeg</label>
                <input name="nopeg" class="form-control" value="{{ $data->nopeg }}" readonly />
                @error('nopeg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="id_dept" class="form-label">Department</label>
                <select name="id_dept" id="id_dept" class="form-control">
                    <option value="">---</option>
                    @foreach ($departments as $item)
                        <option value="{{ $item->id_dept }}" @if($item->id_dept == $data->id_dept) selected @endif >{{ $item->nama_dept }}</option>
                    @endforeach
                </select>
                @error('id_dept')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="id_jabatan" class="form-label">Department</label>
                <select name="id_jabatan" id="id_jabatan" class="form-control">
                    <option value="">---</option>
                    @foreach ($jabatans as $item)
                        <option value="{{ $item->id_jabatan }}" @if($item->id_jabatan == $data->id_jabatan) selected @endif >{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>
                @error('id_jabatan')
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

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('jobdept.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

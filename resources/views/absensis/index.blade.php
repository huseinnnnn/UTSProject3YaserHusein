@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Absensi Pegawai</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="{{ route('absensi.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create Absen </a>
    <div class="card p-3 mt-2">
        <table class="table table-bordered table-sm my-4">
            <tr>
                <th>No</th>
                <th>Nomor Absensi</th>
                <th>Nopeg</th>
                <th>Tanggal Absensi</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Aksi</th>
            </tr>
            @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absensi->id_absensi }}</td>
                    <td>{{ $absensi->pegawai->nopeg }}</td>
                    <td>{{ $absensi->tgl_absensi }}</td>
                    <td>{{ $absensi->jam_masuk }}</td>
                    <td>{{ $absensi->jam_keluar }}</td>
                    <td>
                        <a href="{{ route('absensi.edit', $absensi->id_absensi) }}" class="btn btn-warning btn-sm">
                            <span data-feather="edit">
                            </span>Edit</a>
                        <form action="{{ route('absensi.destroy', $absensi->id_absensi) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin akan menghapus data ?')"><span
                                    data-feather="trash-2"></span>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

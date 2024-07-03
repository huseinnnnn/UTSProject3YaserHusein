@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gaji Pegawai</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="{{ route('gaji.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create Gaji </a>
    <div class="card p-3 mt-2">
        <table class="table table-bordered table-sm my-4">
            <tr>
                <th>No</th>
                <th>Nopeg</th>
                <th>Tanggal</th>
                <th>Gaji</th>
                <th>Tunjangan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $gaji)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gaji->nip }}</td>
                    <td>{{ $gaji->tgl_gaji }}</td>
                    <td>Rp.{{ number_format($gaji->gaji) }}</td>
                    <td>{{ $gaji->tunjangan }} %</td>
                    <td>Rp.{{ number_format($gaji->total_gaji) }}</td>
                    <td>
                        <a href="{{ route('gaji.edit', $gaji->id_gaji) }}" class="btn btn-warning btn-sm">
                            <span data-feather="edit">
                            </span>Edit</a>
                        <form action="{{ route('gaji.destroy', $gaji->id_gaji) }}" method="post" class="d-inline">
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

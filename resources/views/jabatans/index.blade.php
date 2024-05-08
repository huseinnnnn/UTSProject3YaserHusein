@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Jabatan Pegawai</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/jabatan/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create Jabatan </a>
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Aksi</th>
        </tr>
        @foreach ($jabatans as $jabatan)
            <tr>
                <td>{{ $jabatans->firstItem() + $loop->index }}</td>
                <td>{{ $jabatan->nama_jabatan }}</td>
                <td>{{ $jabatan->gaji_pokok }}</td>
                <td>
                    <a href="/jabatan/{{ $jabatan->id_jabatan }}/edit" class="btn btn-warning btn-sm"> <span
                            data-feather="edit">
                        </span>Edit</a>
                    <form action="jabatan/{{ $jabatan->id_jabatan }}" method="post" class="d-inline">
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
    {{ $jabatans->links() }}
@endsection

@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pegawai</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/pegawai/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create Pegawai </a>
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Department</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pegawais as $pegawai)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->alamat }}</td>
                <td>{{ $pegawai->tgl_lahir }}</td>
                <td>{{ $pegawai->j_kelamin }}</td>
                <td>{{ $pegawai->email }}</td>
                <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                <td>{{ $pegawai->department->nama_dept }}</td>
                <td>
                    <a href="/pegawai/{{ $pegawai->nip }}/edit" class="btn btn-warning btn-sm"> <span
                            data-feather="edit">
                        </span>Edit</a>
                    <form action="pegawai/{{ $pegawai->nip }}" method="post" class="d-inline">
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
    {{-- {{ $pegawais->links() }} --}}
@endsection

@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">JobDept</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="{{ route('jobdept.create') }}" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create JobDept </a>
    <div class="card p-3 mt-2">
        <table class="table table-bordered table-sm my-4">
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Department</th>
                <th>Jabatan</th>
                <th>Tanggal Mulai</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->department->nama_dept }}</td>
                    <td>{{ $item->jabatan->nama_jabatan }}</td>
                    <td>{{ $item->tgl_mulai }}</td>
                    <td>
                        <a href="{{ route('jobdept.edit', $item->id_jobdept) }}" class="btn btn-warning btn-sm">
                            <span data-feather="edit">
                            </span>Edit</a>
                        <form action="{{ route('jobdept.destroy', $item->id_jobdept) }}" method="post" class="d-inline">
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

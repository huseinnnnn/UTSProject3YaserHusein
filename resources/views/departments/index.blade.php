@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Department</h1>
    </div>
    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/department/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
        Create Department </a>
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th>No</th>
            <th>Nama Department</th>
            <th>Aksi</th>
        </tr>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $departments->firstItem() + $loop->index }}</td>
                <td>{{ $department->nama_dept }}</td>
                <td>
                    <a href="/department/{{ $department->id_dept }}/edit" class="btn btn-warning btn-sm"> <span
                            data-feather="edit">
                        </span>Edit</a>
                    <form action="department/{{ $department->id_dept }}" method="post" class="d-inline">
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
    {{ $departments->links() }}
@endsection

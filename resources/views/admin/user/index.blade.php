@extends('layouts.main')

@section('content')
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Manajemen Pengguna</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin-user-create') }}" class="btn btn-success">
                <i class="fas fa-user-plus mr-2"></i>Tambah Pengguna Baru
            </a>
        </div>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover" style="width:100%">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->NIK }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin-user-edit', $user->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('admin-user-delete', $user->id) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
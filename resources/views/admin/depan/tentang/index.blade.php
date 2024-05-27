@extends('layouts.main')

@section('content')
<div class="card mb-4 mt-5">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-2 mt-2">
            <h3 class="text-secondary"><strong>Tentang</strong></h3>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin-tentang-create') }}" class="btn btn-outline-info">
                <i class="fa fa-plus-circle mr-1"></i> Tambah Tentang
            </a>
        </div>
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tentangs as $tentang)
                    <tr>
                        <td>{{ $loop->iteration.'.' }}</td>
                        <td class="text-center">{{ $tentang->judul}}</td>
                        <td class="text-center">{{ $tentang->Deskripsi }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin-tentang-destroy', $tentang->id) }}" class="btn btn-sm btn-primary my-1">Hapus</a>
                            <a href="{{ route('admin-tentang-edit', $tentang->id) }}" class="btn btn-sm btn-warning my-1">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
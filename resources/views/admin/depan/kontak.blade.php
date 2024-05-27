@extends('layouts.main')
@section('content')
    <div class="card shadow mb-4 mt-5 border-primary rounded-lg">
        <div class="card-header py-3 bg-primary">
            <h4 class="m-0 font-weight-bold text-white">Edit Biodata</h4>
        </div>
        <div class="card-body bg-light">
            <form class="user" method="POST" action="{{ route('admin-kontak-update', $kontak->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control rounded-pill" id="nama" name="nama" value="{{ $kontak->nama }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control rounded-pill" id="email" name="email" value="{{ $kontak->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" value="{{ $kontak->alamat }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control rounded-pill" id="telepon" name="telepon" value="{{ $kontak->telepon }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gambar" class="form-label">gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block mt-3 rounded-pill">Update Biodata</button>
            </form>
        </div>
    </div>
@endsection
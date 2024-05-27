@extends('layouts.main')
@section('content')
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Biodata Pengguna</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin-user-update', $user->id) }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" id="NIK" name="NIK" placeholder="Masukkan NIK" value="{{ $user->NIK }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama Pengguna" value="{{ $user->username }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi Baru" required>
                        <input type="hidden" name="password_hash" value="{{ Hash::make('password') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection

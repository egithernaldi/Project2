@extends('layouts.main')
@section('content')
    <div class="card border-0 shadow-lg my-5">
        <div class="card-body p-5">
            <h3 class="font-weight-bold text-primary mb-4">Tambah User Baru</h3>
            <form method="POST" action="{{ route('admin-user-store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="text-dark">Nama</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nik" class="text-dark">NIK</label>
                        <input type="text" class="form-control rounded-pill" id="NIK" name="NIK" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username" class="text-dark">Username</label>
                        <input type="text" class="form-control rounded-pill" id="username" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="text-dark">Email</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" class="text-dark">Password</label>
                        <input type="password" class="form-control rounded-pill" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4 rounded-pill">Tambah User</button>
            </form>
        </div>
    </div>
@endsection

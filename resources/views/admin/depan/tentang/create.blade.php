@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0">Buat Tentang</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-tentang-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="judul" name="judul" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="Deskripsi" name="Deskripsi" required></textarea>
                        </div>

                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane mr-1"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

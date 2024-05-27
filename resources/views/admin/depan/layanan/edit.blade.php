@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0">Edit Layanan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-layanan-update', $layanans->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="judul" name="judul" required>{{ old('judul', $layanans->judul) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="Deskripsi" name="Deskripsi" required>{{ old('judul', $layanans->Deskripsi) }}</textarea>
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

@extends('layouts.main')
@section('content')
    <div class="card shadow mb-4 mt-5 border-primary rounded-lg">
        <div class="card-header py-3 bg-primary">
            <h4 class="m-0 font-weight-bold text-white">Edit Biodata</h4>
        </div>
        <div class="card-body bg-light">
            <form class="user" method="POST" action="{{ route('biodata-update', $biodata->id) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control rounded-pill" id="tempat_lahir" name="tempat_lahir" value="{{ $biodata->tempat_lahir }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control rounded-pill" id="tanggal_lahir" name="tanggal_lahir" value="{{ $biodata->tanggal_lahir }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control rounded-pill" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="laki-Laki" {{ $biodata->jenis_kelamin == 'laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Kebangsaan" class="form-label">Kebangsaan</label>
                        <input type="text" class="form-control rounded-pill" id="Kebangsaan" name="Kebangsaan" value="{{ $biodata->Kebangsaan }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-control rounded-pill" id="agama" name="agama" required>
                            <option value="Islam" {{ $biodata->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Protestan" {{ $biodata->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="Katolik" {{ $biodata->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Budha" {{ $biodata->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option value="Hindu" {{ $biodata->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Konghuchu" {{ $biodata->agama == 'Konghuchu' ? 'selected' : '' }}>Konghuchu</option>
                            <option value="Lainnya" {{ $biodata->agama == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-control rounded-pill" id="status_perkawinan" name="status_perkawinan" required>
                            <option value="Menikah" {{ $biodata->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Belum Menikah" {{ $biodata->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Bercerai" {{ $biodata->status_perkawinan == 'Bercerai' ? 'selected' : '' }}>Bercerai</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select class="form-control rounded-pill" id="pendidikan" name="pendidikan" required>
                            <option value="SD" {{ $biodata->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ $biodata->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA" {{ $biodata->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="D3" {{ $biodata->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ $biodata->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ $biodata->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ $biodata->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control rounded-pill" id="pekerjaan" name="pekerjaan" value="{{ $biodata->pekerjaan }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" value="{{ $biodata->alamat }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block mt-3 rounded-pill">Update Biodata</button>
            </form>
        </div>
    </div>
@endsection

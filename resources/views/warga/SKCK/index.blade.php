@extends('layouts.main')

@section('content')
<div class="card shadow mb-4 mt-5 border-left-success">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-success">Surat Pengantar SKCK</h3>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('skck-create') }}" class="btn btn-outline-info">
                <i class="fa fa-plus-circle mr-1"></i> Ajukan Surat
            <a>
        </div>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover" style="width:100%">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Keperluan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Catatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skcks as $skck)
                    <tr>
                        <td class="text-center">{{ $skck->pengajuan->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $skck->tujuan }}</td>
                        <td class="text-center">
                            @switch($skck->pengajuan->status)
                                @case(0)
                                    <span class="badge badge-pill badge-secondary">Menunggu</span>
                                    @break
                                @case(1)
                                    <span class="badge badge-pill badge-primary">Disetujui</span>
                                    @break
                                @case(2)
                                    <span class="badge badge-pill badge-danger">Ditolak</span>
                                    @break
                                @case(3)
                                    <span class="badge badge-pill badge-warning">Revisi</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="text-center">
                            @php
                                $latestLog = $skck->pengajuan->logs()->latest()->first();
                            @endphp
                            {{ $latestLog && $latestLog->catatan ? $latestLog->catatan : '-' }}
                        </td>
                        <td class="text-center">
                            @if (in_array($skck->pengajuan->status, [0, 3]))
                                <a href="{{ route('skck-edit', $skck->id) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-pencil-alt mr-1"></i> Edit
                                </a>
                            @elseif ($skck->pengajuan->status == 1)
                                <a href="{{ route('skck-pdf', $skck->id) }}" class="btn btn-sm btn-outline-secondary" target="_blank">
                                    <i class="fa fa-print mr-1"></i>
                                    Cetak
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

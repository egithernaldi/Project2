@extends('layouts.main')

@section('content')
<div class="card shadow mb-4 mt-5 border-left-primary">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Laporan Surat</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <button id="printButton" class="btn btn-primary">
                <i class="fas fa-print mr-2"></i>Cetak Laporan
            </button>
        </div>
        <!-- Form untuk memilih rentang tanggal -->
        <form id="dateRangeForm" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="start_date" class="sr-only">Tanggal Awal</label>
                    <input type="date" id="start_date" name="start_date" class="form-control mb-2" required>
                </div>
                <div class="col-auto">
                    <label for="end_date" class="sr-only">Tanggal Akhir</label>
                    <input type="date" id="end_date" name="end_date" class="form-control mb-2" required>
                </div>
                <div class="col-auto">
                    <button type="button" id="filterButton" class="btn btn-success mb-2">Tampilkan</button>
                </div>
            </div>
        </form>
        
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $laporan->user->NIK }}</td>
                        <td class="text-center">{{ $laporan->user->name }}</td>
                        <td class="text-center">{{ $laporan->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $laporan->surat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendapatkan nilai-nilai input tanggal dari parameter URL
        const urlParams = new URLSearchParams(window.location.search);
        const startDateParam = urlParams.get('start_date');
        const endDateParam = urlParams.get('end_date');

        // Set nilai-nilai input tanggal jika ada parameter URL
        if (startDateParam && endDateParam) {
            document.getElementById('start_date').value = startDateParam;
            document.getElementById('end_date').value = endDateParam;
        }

        document.getElementById('filterButton').addEventListener('click', function() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            
            // Validasi manual untuk memastikan kedua tanggal diisi
            if (!startDate || !endDate) {
                alert('Mohon isi tanggal awal dan tanggal akhir.');
                return; // Hentikan eksekusi fungsi lebih lanjut
            }
            
            var url = "{{ route('admin-laporan-filter') }}?start_date=" + startDate + "&end_date=" + endDate;
            window.location.href = url;
        });

        document.getElementById('printButton').addEventListener('click', function() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            
            // Validasi manual untuk memastikan kedua tanggal diisi
            if (!startDate || !endDate) {
                alert('Mohon isi tanggal awal dan tanggal akhir.');
                return; // Hentikan eksekusi fungsi lebih lanjut
            }
            
            var url = "{{ route('admin-laporan-cetak') }}?start_date=" + startDate + "&end_date=" + endDate;
            window.open(url, '_blank');
        });
    });
</script>
@endsection

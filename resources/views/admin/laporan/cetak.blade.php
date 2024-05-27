<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat</title>
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        .card {
            border: none;
        }

        .card-body {
            padding: 1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            border: 1px solid #dee2e6;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: none;
        }

        .tanda-tangan {
            text-align: right;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <table class="header">
        <tr>
            <td style="padding-right: 50px;"><img height="100" width="100" src="https://upload.wikimedia.org/wikipedia/commons/5/57/Lambang_Kabupaten_Padang_Pariaman.png" alt="Logo Instansi"></td>
            <td>
                <center>
                    <font size="4">PEMERINTAH KABUPATEN PADANG PARIAMAN</font><br>
                    <font size="4">KECAMATAN BATANG ANAI</font><br>
                    <font size="4">WALI NAGARI SUNGAI BULUAH SELATAN</font><br>
                    <font size="2">Jl. Raya Padang-Bukittinggi KM.23,5 Nagari Sungai Buluah Selatan</font><br>
                    <font size="2">Kec. Batang Anai Kab. Padang Pariaman</font><br>
                </center>

            </td>
        </tr>
      </table>
    <hr>

    <div class="card mb-4 mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
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
                            <td class="text-center">{{ $laporan->created_at }}</td>
                            <td class="text-center">{{ $laporan->surat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button onclick="printPage()" class="btn btn-primary">Cetak Laporan</button>
        </div>
    </div>

    <div class="tanda-tangan">
        <p>Padang Pariaman, {{ date('d M Y') }}</p>
        <p>Mengetahui, Pj. Wali Nagari</p>
        <br><br><br>
        <p>ARMUZAN, SST</p>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kop Surat</title>
    <style>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding:20px;
            padding-right: 20px
        }

        #logo {
            width: 100px; /* Sesuaikan dengan lebar logo */
            height: auto;
            margin-top: 50px;
            position: absolute;
        }

        #instansi-info {
            text-align: center;
         
        }

        #instansi-info h1, #instansi-info p {
    
           
        }

        .tr {
            text-align: justify;
        }
        .th {
            text-align: ;
        }

        .table {
            margin: 0 auto; /* Mengatur agar tabel berada di tengah */
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            
        }
        .signature {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        .left {
            width: 50%; /* Memberikan lebar 50% pada setiap td */
            padding: 10px;
        }
        .right {
            width: 50%; /* Memberikan lebar 50% pada setiap td */
            padding: 10px;
        }
    </style>
</head>
<body>

    



<div id="header">
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
    <h3 style="text-align: center;">SURAT KETERANGAN</h3>
    <p style="text-align: center;">Nomor : {{$umum->pengajuan->kode_surat}}</p>
    

    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Wali Nagari Sungai Buluah Selatan Kecamatan Batang Anai Kabupaten Padang Pariaman, menerangkan
            bahwa:</p>

        <table class="table text-left">
            <tbody>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $biodata->user->NIK }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $biodata->user->name }}</td>
            </tr>
            @isset($biodata)
                <tr>
                    <td>Tempat/Tgl.Lahir</td>
                    <td>:</td>
                    <td>{{ $biodata->tempat_lahir }}, {{ $biodata->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $biodata->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td>{{ $biodata->Kebangsaan }}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td>{{ $biodata->status_perkawinan }}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td>{{ $biodata->pendidikan }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $biodata->alamat }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{ $umum->keterangan }}</td>
                </tr>
                <tr>
                    <td>Di gunakan untuk</td>
                    <td>:</td>
                    <td>{{ $umum->tujuan }}</td>
                </tr>

            </tbody>
        </table>
        @else
            <p>Biodata belum diisi.</p>
        @endisset

        <p>Demikian Surat Keterangan ini  kami buat,  untuk di pergunakan sebagaiamana mestinya. </p>
    </div>

    <div class="footer" style="margin-top: 20px">
        <p> {{ \Carbon\Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</p>
        <p>WALI NAGARI</p>
        
    </div>
    <div class="footer" style="margin-top: 10px">
        <img height="80" width="80" src="https://upload.wikimedia.org/wikipedia/id/b/b7/Tanda_Tangan_Sjachroedin_ZP.png" alt="Surat Keterangan">
        <p>A R M U Z A N, SST</p>
    </div>
</div>

<!-- Isi surat atau konten lainnya -->

</body>
</html>




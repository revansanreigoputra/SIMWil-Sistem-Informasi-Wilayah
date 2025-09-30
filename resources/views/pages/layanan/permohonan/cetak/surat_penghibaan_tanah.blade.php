<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Penghibahan Tanah</title>
    <style>
        @page {
            size: A4;
            margin: 3cm 2.5cm 3cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
        }

        .page {
            background: #fff;
            width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 3cm 2.5cm;
        }

        /* Kop Surat */
        .kop {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 10px;
            margin-bottom: 18px;
            border-bottom: 3px solid #000;
        }

        .kop .logo {
            flex: 0 0 90px;
            display: flex;
            justify-content: center;
        }

        .kop .logo img {
            width: 90px;
            height: auto;
            display: block;
        }

        .kop .header {
            flex: 1;
            text-align: center;
        }

        .kop .header h2 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
            line-height: 1.1;
        }

        .kop .header h3 {
            margin: 2px 0 0 0;
            font-size: 14pt;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .kop .header p {
            margin: 6px 0 0 0;
            font-size: 11pt;
        }

        .judul {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 12px;
        }

        .judul h3 {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0;
        }

        .judul p {
            font-size: 12pt;
            margin: 6px 0 0 0;
        }

        .content {
            font-size: 12pt;
            line-height: 1.6;
            text-align: justify;
        }

        .content table {
            margin: 15px 0 15px 30px;
            border-collapse: collapse;
        }

        .content table td {
            padding: 2px 6px;
            vertical-align: top;
        }

        .ttd {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .ttd .isi {
            text-align: center;
            font-size: 12pt;
        }

        .saksi {
            margin-top: 40px;
            font-size: 12pt;
        }

        @media screen {
            body {
                background: #f2f2f2;
                padding: 20px;
            }
            .page {
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }
        }
    </style>
</head>
<body>

<div class="page">

    <!-- Kop Surat -->
    <div class="kop">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Garuda_Pancasila_2.svg" alt="Logo Garuda">
        </div>

        <div class="header">
            <h2>PEMERINTAH DESA DABO BARU</h2>
            <h3>KECAMATAN LINGGA, KABUPATEN LINGGA</h3>
            <p>Alamat: Jl. Raya Dabo Baru No.123, Telp. (0274) 123456</p>
        </div>
    </div>

    <!-- Judul -->
    <div class="judul">
        <h3>SURAT PERNYATAAN PENGHIBAHAN TANAH</h3>
        <p>Nomor : {{ $data->nomor ?? '05/HB/IX/2025' }}</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan di bawah ini :</p>

        <p><b>Pihak Pertama (Pemberi Hibah)</b></p>
        <table>
            <tr><td>Nama</td><td>:</td><td>{{ $data->pemberi_nama ?? 'SUDARNO' }}</td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>:</td><td>{{ $data->pemberi_ttl ?? 'Yogyakarta, 10 Januari 1965' }}</td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td>{{ $data->pemberi_pekerjaan ?? 'Petani' }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $data->pemberi_alamat ?? 'Dusun Karangjati, Desa Dabo Baru' }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $data->pemberi_nik ?? '3401123456789001' }}</td></tr>
        </table>

        <p>Dengan ini menyatakan telah menghibahkan sebidang tanah milik saya kepada:</p>

        <p><b>Pihak Kedua (Penerima Hibah)</b></p>
        <table>
            <tr><td>Nama</td><td>:</td><td>{{ $data->penerima_nama ?? 'RAHMAWATI' }}</td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>:</td><td>{{ $data->penerima_ttl ?? 'Yogyakarta, 5 Mei 1990' }}</td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td>{{ $data->penerima_pekerjaan ?? 'Wiraswasta' }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $data->penerima_alamat ?? 'Dusun Karangjati, Desa Dabo Baru' }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $data->penerima_nik ?? '3401123456789002' }}</td></tr>
        </table>

        <p>Adapun tanah yang dihibahkan terletak di {{ $data->lokasi ?? 'Dusun Karangjati, Desa Dabo Baru' }}, dengan keterangan:</p>
        <ul>
            <li>Luas Tanah: {{ $data->luas ?? '300 m²' }}</li>
            <li>Status Tanah: {{ $data->status ?? 'Hak Milik (SHM No. 1234/DB)' }}</li>
            <li>Batas-batas: 
                <br>Utara: {{ $data->batas_utara ?? 'Tanah milik Bapak Suroso' }}
                <br>Selatan: {{ $data->batas_selatan ?? 'Jalan Desa' }}
                <br>Timur: {{ $data->batas_timur ?? 'Tanah milik Ibu Sulastri' }}
                <br>Barat: {{ $data->batas_barat ?? 'Sungai Kecil' }}
            </li>
        </ul>

        <p>
            Dengan ini saya serahkan sepenuhnya kepada pihak kedua tanpa syarat apapun. 
            Hibah ini dilakukan dengan ikhlas, tanpa adanya paksaan dari pihak manapun.
        </p>

        <p>
            Demikian surat hibah ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <div class="isi">
            <p>Pihak Pertama</p>
            <br><br><br>
            <p>( {{ $data->pemberi_nama ?? 'SUDARNO' }} )</p>
        </div>
        <div class="isi">
            <p>Pihak Kedua</p>
            <br><br><br>
            <p>( {{ $data->penerima_nama ?? 'RAHMAWATI' }} )</p>
        </div>
    </div>

    <!-- Saksi -->
    <div class="saksi">
        <p>Saksi-saksi:</p>
        <ol>
            <li>{{ $data->saksi1 ?? '(………………………….)' }}</li>
            <li>{{ $data->saksi2 ?? '(………………………….)' }}</li>
        </ol>

        <p style="margin-top:25px;">
            Mengetahui,<br> Kepala Desa Dabo Baru
        </p>
        <br><br>
        <p>( {{ $data->kepala_desa ?? 'Carmadi' }} )</p>
    </div>

</div>

</body>
</html>
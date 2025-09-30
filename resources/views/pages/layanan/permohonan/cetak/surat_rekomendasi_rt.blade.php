<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi RT</title>
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
            justify-content: flex-end;
        }

        .ttd .isi {
            text-align: center;
            font-size: 12pt;
        }

        .ttd .isi p {
            margin: 5px 0;
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
            <h2>RUKUN TETANGGA 03</h2>
            <h3>KELURAHAN SUKAMAJU, KECAMATAN SUKASARI, KOTA BANDUNG</h3>
            <p>Alamat: Jl. Melati No. 10, RT 03 RW 05, Telp. (022) 987654</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="judul">
        <h3>SURAT REKOMENDASI</h3>
        <p>Nomor : 05/RT.03/I/2025</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Ketua RT 03 RW 05 Kelurahan Sukamaju, Kecamatan Sukasari, Kota Bandung, menerangkan bahwa:</p>

        <table>
            <tr><td width="200">Nama</td><td>:</td><td><b>{{ $nama ?? 'Andi Saputra' }}</b></td></tr>
            <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>{{ $ttl ?? 'Bandung, 12 Maret 1995' }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $jk ?? 'Laki-laki' }}</td></tr>
            <tr><td>Agama</td><td>:</td><td>{{ $agama ?? 'Islam' }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $alamat ?? 'Jl. Melati No. 10, RT 03 RW 05' }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $nik ?? '3201234567890001' }}</td></tr>
        </table>

        <p>Adalah benar warga kami yang berdomisili di alamat tersebut di atas. Dengan ini memberikan rekomendasi kepada yang bersangkutan untuk:</p>

        <p><em>{{ $keperluan ?? 'Mengurus administrasi pindah domisili' }}</em>.</p>

        <p>Demikian surat rekomendasi ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <div class="isi">
            <p>Bandung, {{ $tanggal ?? date('d F Y') }}</p>
            <br><br><br>
            <p><b>{{ $nama_rt ?? 'Budi Santoso' }}</b></p>
            <p>Ketua RT 03 RW 05</p>
        </div>
    </div>

</div>

</body>
</html>

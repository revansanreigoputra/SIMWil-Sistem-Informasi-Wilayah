<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi Ijin Tempat</title>
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
            <h2>PEMERINTAH DESA DABO BARU</h2>
            <h3>KECAMATAN LINGGA, KABUPATEN YOGYAKARTA</h3>
            <p>Alamat: Jl. Raya Dabo Baru No.123, Telp. (0274) 123456</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="judul">
        <h3>SURAT REKOMENDASI IJIN TEMPAT</h3>
        <p>Nomor : {{ $no_surat ?? '003/DS-DB/IX/2025' }}</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr><td width="200">Nama</td><td>:</td><td>Carmadi</td></tr>
            <tr><td>Jabatan</td><td>:</td><td>Kepala Desa Dabo Baru</td></tr>
        </table>

        <p>Dengan ini menerangkan bahwa:</p>
        <table>
            <tr><td>Nama</td><td>:</td><td>{{ $nama ?? 'DESI MARETA' }}</td></tr>
            <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>{{ $ttl ?? 'Dabo Singkep / 15 Mei 1984' }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $jk ?? 'Perempuan' }}</td></tr>
            <tr><td>Agama</td><td>:</td><td>{{ $agama ?? 'Islam' }}</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $alamat ?? 'Jalan Lurung Rayan RT.12 RW.12, Desa Dabo Baru' }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $nik ?? '2104015505840000' }}</td></tr>
            <tr><td>No. KK</td><td>:</td><td>{{ $kk ?? '654321' }}</td></tr>
        </table>

        <p>
            Benar yang bersangkutan adalah penduduk Desa Dabo Baru, Kecamatan Lingga, Kabupaten Yogyakarta.
            Yang bersangkutan mengajukan <b>ijin pemakaian tempat</b> untuk:
        </p>
        <table>
            <tr><td width="200">Keperluan</td><td>:</td><td>{{ $keperluan ?? 'Pembukaan Usaha Toko Sembako' }}</td></tr>
            <tr><td>Lokasi</td><td>:</td><td>{{ $lokasi ?? 'Jl. Merdeka No.45, Desa Dabo Baru' }}</td></tr>
        </table>

        <p>
            Sehubungan dengan itu, maka kami memberikan rekomendasi agar yang bersangkutan dapat menggunakan
            tempat tersebut sesuai dengan ketentuan yang berlaku.
        </p>

        <p>
            Demikian surat rekomendasi ini dibuat agar dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <div class="isi">
            <p>Dabo Baru, {{ $tanggal ?? '24 September 2025' }}</p>
            <br><br><br>
            <p><b><u>{{ $ttd ?? 'Carmadi' }}</u></b></p>
            <p>Kepala Desa</p>
        </div>
    </div>

</div>

</body>
</html>

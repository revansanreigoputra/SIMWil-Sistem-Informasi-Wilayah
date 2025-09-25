<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi IMB</title>
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

        /* Kop surat */
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

    <!-- Kop Surat dengan logo -->
    <div class="kop">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Garuda_Pancasila_2.svg" alt="Logo Garuda">
        </div>
        <div class="header">
            <h2>PEMERINTAH PROVINSI JAWA BARAT</h2>
            <h3>KABUPATEN YOGYAKARTA</h3>
            <p>Alamat: Jl. Raya Kabupaten No.123, Telp. (0274) 987654</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="judul">
        <h3>SURAT REKOMENDASI IJIN MENDIRIKAN BANGUNAN</h3>
        <p>Nomor : 001/KHC/I/2017</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertandatangan di bawah ini :</p>

        <table>
            <tr><td width="200">Nama</td><td>:</td><td>Carmadi</td></tr>
            <tr><td>Jabatan</td><td>:</td><td>Kepala Desa</td></tr>
        </table>

        <p>Dengan ini menerangkan bahwa:</p>

        <table>
            <tr><td width="200">Nama</td><td>:</td><td>DESI MARETA</td></tr>
            <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>Dabo Singkep, 15 Mei 1984</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>Perempuan</td></tr>
            <tr><td>Agama</td><td>:</td><td>Islam</td></tr>
            <tr><td>Alamat</td><td>:</td><td>Jalan Lurung Rayan RT.12 RW.12, Desa Dabo Baru, Kecamatan Lingga, Kabupaten Lingga</td></tr>
            <tr><td>NIK</td><td>:</td><td>2104015505840000</td></tr>
            <tr><td>No KK</td><td>:</td><td>654321</td></tr>
        </table>

        <p>
            Untuk mengurus Ijin Mendirikan Bangunan (IMB) di atas tanah miliknya yang bersertifikat Nomor 0123456789.
        </p>

        <p>
            Berhubung maksud tersebut, dimohon agar pihak yang berwenang dapat memberikan bantuan serta fasilitas seperlunya.
        </p>

        <p>
            Demikian surat rekomendasi ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <div class="isi">
            <p>Dabo Baru, 26 Januari 2017</p>
            <br><br><br>
            <p><u>Carmadi</u></p>
            <p>Kepala Desa</p>
        </div>
    </div>

</div>

</body>
</html>

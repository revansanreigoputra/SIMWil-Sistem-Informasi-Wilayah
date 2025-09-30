<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Belum Pernah Nikah</title>
    <style>
        @page {
            size: A4;
            margin: 3cm 2.5cm 3cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
        }

        /* Halaman */
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

    <!-- Kop Surat -->
    <div class="kop">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Garuda_Pancasila_2.svg" alt="Logo Garuda">
        </div>
        <div class="header">
            <h2>PEMERINTAH PROVINSI JAWA BARAT</h2>
            <h3>KABUPATEN YOGYAKARTA</h3>
            <p>Alamat: Jl. Raya Dabo Baru No.123, Telp. (0274) 123456</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="judul">
        <h3>SURAT KETERANGAN BELUM PERNAH NIKAH</h3>
        <p>Nomor : 004/10/SKT/DS-LB/IX/2025</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>
            Berdasarkan Keputusan Bupati LINGGA Nomor : 259/K-III/140/2012 tentang Kepala Desa DABO BARU Kecamatan
            LINGGA Kabupaten LINGGA, dengan ini menerangkan kepada nama sebagai berikut:
        </p>

        <table>
            <tr><td width="200">Nama</td><td>:</td><td><b>Carmadi</b></td></tr>
            <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>Palangkaraya / 20 Januari 1991</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>Perempuan</td></tr>
            <tr><td>Agama</td><td>:</td><td>Islam</td></tr>
            <tr><td>Alamat</td><td>:</td><td>Jalan Lurung Rayan RT.12 RW.12, Desa DABO BARU Kecamatan LINGGA Kabupaten LINGGA</td></tr>
            <tr><td>NIK</td><td>:</td><td>311298746930021</td></tr>
            <tr><td>No KK</td><td>:</td><td>654321</td></tr>
        </table>

        <p>
            Bahwa yang tersebut namanya di atas adalah benar penduduk yang berdomisili secara berturut-turut tetap di RT.12 RW.12 Desa DABO BARU Kecamatan LINGGA,
            yang bersangkutan <b>Belum Pernah Nikah</b>, baik secara agama Islam atau agama lain maupun secara Adat.
        </p>

        <p>
            Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <div class="isi">
            <p>DABO BARU, 11 September 2025</p>
            <br><br><br>
            <p><b>Carmadi</b></p>
            <p>Kepala Desa</p>
        </div>
    </div>

</div>

</body>
</html>

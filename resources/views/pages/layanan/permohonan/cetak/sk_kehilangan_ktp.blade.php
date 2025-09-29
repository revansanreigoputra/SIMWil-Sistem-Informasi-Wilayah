<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kehilangan KTP</title>
    <style>
        @page {
            size: A4;
            margin: 3cm 2.5cm 3cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            font-size: 12pt;
            line-height: 1.6;
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
        }

        .kop .header h3 {
            margin: 2px 0 0;
            font-size: 14pt;
            text-transform: uppercase;
        }

        .kop .header p {
            margin: 6px 0 0;
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
            margin-top: 60px;
            display: flex;
            justify-content: flex-end;
        }

        .ttd .isi {
            text-align: center;
        }

        .ttd .isi p {
            margin: 5px 0;
        }

        /* Background abu buat preview layar */
        @media screen {
            body {
                background: #f2f2f2;
                padding: 20px;
            }

            .page {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
            <h3>SURAT KETERANGAN KEHILANGAN KTP</h3>
            <p>Nomor : 223/06/DS-LB/PEM/IX/2025</p>
        </div>

        <!-- Isi -->
        <div class="content">
            <p>Yang bertanda tangan di bawah ini Kepala Desa Dabo Baru Kecamatan Lingga Kabupaten Lingga, dengan ini
                menerangkan bahwa:</p>

            <table>
                <tr>
                    <td width="200">Nama</td>
                    <td>:</td>
                    <td><b>Rizal</b></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td>Indramayu / 13 Agustus 2025</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>Perempuan</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>Islam</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>Jatibarang RT.21 RW.6, Desa DABO BARU</td>
                </tr>
                <tr>
                    <td>Kecamatan / Kabupaten</td>
                    <td>:</td>
                    <td>LINGGA / LINGGA</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>32121</td>
                </tr>
                <tr>
                    <td>No KK</td>
                    <td>:</td>
                    <td>1234567</td>
                </tr>
            </table>

            <p>Bahwa pada tanggal 09 September 2025 telah terjadi kehilangan Kartu Tanda Penduduk (KTP) atas nama
                tersebut diatas dalam perjalanan di asasas, karena itu mohon diterbitkan Kartu Tanda Penduduk (KTP)
                baru. Di dinas pencatatan sipil Kabupaten LINGGA.</p>

            <p>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana
                mestinya.</p>
        </div>

        <!-- TTD -->
        <div class="ttd">
            <div class="isi">
                <p>Dabo Baru, 11 September 2025</p>
                <br><br><br>
                <p>Carmadi</p>
                <p>Kepala Desa</p>
            </div>
        </div>

    </div>

</body>

</html>

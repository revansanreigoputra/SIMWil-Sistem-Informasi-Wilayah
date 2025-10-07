<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Lembaga Pemerintahan</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 13px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        h2, h4 {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", Times, serif;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        .header h2 {
            font-size: 20px;
            font-weight: bold;
        }
        .header h4 {
            font-size: 14px;
            font-weight: normal;
            margin-top: 5px;
        }
        hr {
            border: none;
            border-top: 2px solid #000;
            margin: 15px auto;
            width: 90%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: #f8f8f8;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 80px;
            width: 100%;
            text-align: right;
            font-size: 13px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>Detail Data Lembaga Pemerintahan</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal</th>
                <td>02-10-2025</td>
            </tr>
            <tr>
                <th>Dasar Hukum Pembentukan</th>
                <td>Peraturan Desa No. 1/2020</td>
            </tr>
            <tr>
                <th>Dasar Hukum BPD</th>
                <td>Peraturan BPD No. 2/2020</td>
            </tr>
            <tr>
                <th>Jumlah Aparat</th>
                <td>10</td>
            </tr>
            <tr>
                <th>Jumlah Perangkat Desa</th>
                <td>5</td>
            </tr>
            <tr>
                <th>Kepala Desa</th>
                <td>Ahmad</td>
            </tr>
            <tr>
                <th>Sekretaris Desa</th>
                <td>Siti</td>
            </tr>
            <tr>
                <th>Jumlah Staf</th>
                <td>3</td>
            </tr>
        </tbody>
    </table>

    <h4>Data Anggota BPD</h4>
    <table>
        <thead>
            <tr>
                <th class="text-center" width="10%">No</th>
                <th>Nama</th>
                <th>Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Alice</td>
                <td>SMA</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Bob</td>
                <td>D3</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Charlie</td>
                <td>S1</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>......................., .................. 2025</p>
        <br><br><br>
        <p>(_____________________)</p>
    </div>

</body>
</html>

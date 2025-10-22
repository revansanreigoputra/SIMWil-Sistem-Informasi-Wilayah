<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Partisipasi Politik</title>
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
        <h2>Detail Data Partisipasi Politik</h2>
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
                <th>Jenis Partisipasi Politik</th>
                <td>Pemilu Desa</td>
            </tr>
            <tr>
                <th>Jumlah Wanita Hak Pilih</th>
                <td>120</td>
            </tr>
            <tr>
                <th>Jumlah Pria Hak Pilih</th>
                <td>130</td>
            </tr>
            <tr>
                <th>Jumlah Pemilih</th>
                <td>250</td>
            </tr>
            <tr>
                <th>Jumlah Wanita Memilih</th>
                <td>110</td>
            </tr>
            <tr>
                <th>Jumlah Pria Memilih</th>
                <td>120</td>
            </tr>
            <tr>
                <th>Jumlah Pengguna Hak Pilih</th>
                <td>230</td>
            </tr>
            <tr>
                <th>Persentase (%)</th>
                <td>92%</td>
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

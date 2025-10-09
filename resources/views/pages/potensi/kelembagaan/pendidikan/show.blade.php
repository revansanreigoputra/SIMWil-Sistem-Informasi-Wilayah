<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Lembaga Pendidikan Formal</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        h2, h4 {
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 60px;
            width: 100%;
            text-align: right;
            font-size: 13px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>Detail Data Lembaga Pendidikan Formal</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal</th>
                <td>2025-10-02</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>Formal</td>
            </tr>
            <tr>
                <th>Tingkatan/Jenis Sekolah</th>
                <td>SD</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>Negeri</td>
            </tr>
            <tr>
                <th>Jumlah Negeri</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Jumlah Swasta</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Jumlah Dimiliki Desa</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Jumlah Pengajar</th>
                <td>0</td>
            </tr>
            <tr>
                <th>Jumlah Siswa</th>
                <td>0</td>
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

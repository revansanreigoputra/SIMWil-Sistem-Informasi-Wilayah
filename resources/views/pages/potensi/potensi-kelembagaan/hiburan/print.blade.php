<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Usaha Jasa, Hiburan, dll</title>
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
        .footer {
            margin-top: 80px;
            width: 100%;
            text-align: right;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Detail Usaha Jasa, Hiburan, dan Lainnya</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($hiburan->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $hiburan->kategori->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Usaha</th>
                <td>{{ $hiburan->jenisUsaha->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah (Unit)</th>
                <td>{{ $hiburan->jumlah_unit ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Tenaga Kerja</th>
                <td>{{ $hiburan->jumlah_tenaga_kerja ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Jenis Produk yang Diperdagangkan</th>
                <td>{{ $hiburan->jenis_produk ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <br><br><br>
        <p>(_____________________)</p>
    </div>

</body>
</html>

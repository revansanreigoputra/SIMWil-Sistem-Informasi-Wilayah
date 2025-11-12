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
<body>

    <div class="header">
        <h2>Detail Data Lembaga Pendidikan Formal</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $data->kategori->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tingkatan/Jenis Sekolah</th>
                <td>{{ $data->jenisSekolah->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $data->status }}</td>
            </tr>
            <tr>
                <th>Jumlah Negeri</th>
                <td>{{ $data->jumlah_negeri ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Swasta</th>
                <td>{{ $data->jumlah_swasta ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Dimiliki Desa</th>
                <td>{{ $data->jumlah_dimiliki_desa ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $data->jumlah ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Pengajar</th>
                <td>{{ $data->jumlah_pengajar ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>......................., .................. {{ date('Y') }}</p>
        <br><br><br>
        <p>(_____________________)</p>
    </div>

</body>
</html>

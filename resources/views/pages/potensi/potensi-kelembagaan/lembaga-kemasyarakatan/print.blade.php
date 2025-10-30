<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Lembaga Kemasyarakatan</title>
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
        <h2>Detail Data Lembaga Kemasyarakatan</h2>
        <h4>Desa {{ $data->desa ?? 'Nama Desa' }}, Kecamatan {{ $data->kecamatan ?? 'Nama Kecamatan' }}</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Lembaga</th>
                <td>{{ $data->jenisLembaga->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $data->jumlah ?? 0 }}</td>
            </tr>
            <tr>
                <th>Dasar Hukum</th>
                <td>{{ $data->dasarHukum->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Pengurus</th>
                <td>{{ $data->jumlah_pengurus ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Jenis Kegiatan</th>
                <td>{{ $data->jumlah_jenis_kegiatan ?? 0 }}</td>
            </tr>
            <tr>
                <th>Alamat Kantor</th>
                <td>{{ $data->alamat_kantor ?? '-' }}</td>
            </tr>
            <tr>
                <th>Ruang Lingkup Kegiatan</th>
                <td>{{ $data->ruang_lingkup_kegiatan ?? '-' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>{{ $data->desa ?? '.......................' }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <br><br><br>
        <p>(_____________________)</p>
    </div>

</body>
</html>

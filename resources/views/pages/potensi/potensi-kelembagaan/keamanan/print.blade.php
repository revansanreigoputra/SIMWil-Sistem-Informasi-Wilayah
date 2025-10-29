<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Lembaga Keamanan</title>
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
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f8f8f8;
            width: 40%;
        }
        .footer {
            margin-top: 60px;
            text-align: right;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Detail Data Lembaga Keamanan</h2>
        <h4>Desa Dabo Baru, Kecamatan Singkep — Kabupaten Lingga</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Keberadaan Hansip & Linmas</th>
                <td>{{ $data->keberadaan_hansip_linmas ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Hansip</th>
                <td>{{ $data->jumlah_hansip ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Satgas Linmas</th>
                <td>{{ $data->jumlah_satgas_linmas ?? '-' }}</td>
            </tr>
            <tr>
                <th>Pelaksanaan Siskamling</th>
                <td>{{ $data->pelaksanaan_siskamling ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Pos Kamling</th>
                <td>{{ $data->jumlah_pos_kamling ?? '-' }}</td>
            </tr>
            <tr>
                <th>Keberadaan Satpam Swakarsa</th>
                <td>{{ $data->keberadaan_satpam_swakarsa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Satpam</th>
                <td>{{ $data->jumlah_anggota_satpam ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nama Organisasi Induk</th>
                <td>{{ $data->nama_organisasi_induk ?? '-' }}</td>
            </tr>
            <tr>
                <th>Pemilik Organisasi</th>
                <td>{{ optional($data->pemilikOrganisasi)->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Keberadaan Organisasi Keamanan Lainnya</th>
                <td>{{ $data->keberadaan_organisasi_lain ?? '-' }}</td>
            </tr>
            <tr>
                <th>Mitra Koramil / TNI</th>
                <td>{{ $data->mitra_koramil_tni ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Koramil / TNI</th>
                <td>{{ $data->jumlah_anggota_koramil_tni ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan Koramil / TNI</th>
                <td>{{ $data->jumlah_kegiatan_koramil_tni ?? '-' }}</td>
            </tr>
            <tr>
                <th>Babinkantibmas / POLRI</th>
                <td>{{ $data->babinkantibmas_polri ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Babinkantibmas</th>
                <td>{{ $data->jumlah_anggota_babinkantibmas ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan Babinkantibmas</th>
                <td>{{ $data->jumlah_kegiatan_babinkantibmas ?? '-' }}</td>
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

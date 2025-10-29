<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Detail Lembaga Adat</title>
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
            width: 45%;
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
        <h2>Detail Data Lembaga Adat</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Pemangku Adat</th>
                <td>{{ $data->pemangku_adat ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Kepengurusan Adat</th>
                <td>{{ $data->kepengurusan_adat ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Rumah Adat</th>
                <td>{{ $data->rumah_adat ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Barang Pusaka</th>
                <td>{{ $data->barang_pusaka ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Naskah-Naskah Adat</th>
                <td>{{ $data->naskah_naskah ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Lainnya</th>
                <td>{{ $data->lainnya ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Musyawarah Adat</th>
                <td>{{ $data->musyawarah_adat ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Sanksi Adat</th>
                <td>{{ $data->sanksi_adat ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Perkawinan</th>
                <td>{{ $data->upacara_adat_perkawinan ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Kematian</th>
                <td>{{ $data->upacara_adat_kematian ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Kelahiran</th>
                <td>{{ $data->upacara_adat_kelahiran ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Bercocok Tanam</th>
                <td>{{ $data->upacara_adat_bercocok_tanam ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Perikanan Laut</th>
                <td>{{ $data->upacara_adat_perikanan_laut ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Bidang Kehutanan</th>
                <td>{{ $data->upacara_adat_bidang_kehutanan ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Pengelolaan SDA</th>
                <td>{{ $data->upacara_adat_pengelolaan_sda ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Pembangunan Rumah</th>
                <td>{{ $data->upacara_adat_pembangunan_rumah ? 'Ada' : 'Tidak Ada' }}</td>
            </tr>
            <tr>
                <th>Upacara Adat Penyelesaian Masalah</th>
                <td>{{ $data->upacara_adat_penyelesaian_masalah ? 'Ada' : 'Tidak Ada' }}</td>
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

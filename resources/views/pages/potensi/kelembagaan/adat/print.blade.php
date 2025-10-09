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
        <h2>Detail Data Lembaga Keamanan</h2>
        <h4>Desa Contoh, Kecamatan Contoh</h4>
        <hr>
    </div>

    <table>
        <tbody>
            <!-- Hansip dan Linmas -->
            <tr>
                <th width="40%">Tanggal</th>
                <td>02-10-2025</td>
            </tr>
            <tr>
                <th>Keberadaan Hansip & Linmas</th>
                <td>Ada</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Hansip</th>
                <td>15</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Satgas Linmas</th>
                <td>10</td>
            </tr>
            <tr>
                <th>Pelaksanaan Siskamling</th>
                <td>Ya</td>
            </tr>
            <tr>
                <th>Jumlah Pos Kamling</th>
                <td>5</td>
            </tr>

            <!-- Satpam Swakarsa -->
            <tr>
                <th>Keberadaan SATPAM SWAKARSA</th>
                <td>Ada</td>
            </tr>
            <tr>
                <th>Jumlah Anggota Satpam</th>
                <td>12</td>
            </tr>
            <tr>
                <th>Nama Organisasi Induk</th>
                <td>Organisasi Contoh</td>
            </tr>
            <tr>
                <th>Pemilik Organisasi</th>
                <td>Perorangan</td>
            </tr>
            <tr>
                <th>Keberadaan Organisasi Keamanan Lainnya</th>
                <td>Ada</td>
            </tr>

            <!-- Kerjasama TNI-POLRI -->
            <tr>
                <th>Mitra Koramil/TNI</th>
                <td>Ada</td>
            </tr>
            <tr>
                <th>Jumlah Anggota (TNI)</th>
                <td>8</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan (TNI)</th>
                <td>3</td>
            </tr>
            <tr>
                <th>Babinkantibmas/POLRI</th>
                <td>Ada</td>
            </tr>
            <tr>
                <th>Jumlah Anggota (POLRI)</th>
                <td>4</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan (POLRI)</th>
                <td>2</td>
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

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
        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>DETAIL DATA POTENSI KELEMBAGAAN</h2>
        <h4>PEMERINTAHAN DESA</h4>
        <hr>
    </div>
    
    <div class="section-title">A. Data Umum Organisasi</div>
    <table>
        <tbody>
            <tr>
                <th width="30%">Tanggal Data</th>
                <td>{{ \Carbon\Carbon::parse($potensi->tanggal_data)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Dasar Hukum Pembentukan (Lembaga)</th>
                <td>{{ $potensi->dasar_hukum_pembentukan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Dasar Hukum Pembentukan BPD</th>
                <td>{{ $potensi->dasar_hukum_pembentukan_bpd ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Aparat Pemerintah</th>
                <td>{{ $potensi->jumlah_aparat_pemerintah ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Perangkat Desa</th>
                <td>{{ $potensi->jumlah_perangkat_desa ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jumlah Staf</th>
                <td>{{ $potensi->jumlah_staf ?? 0 }}</td>
            </tr>
             <tr>
                <th>Jumlah Dusun</th>
                <td>{{ $potensi->jumlah_dusun ?? 0 }}</td>
            </tr>
            <tr>
                <th>Keberadaan BPD</th>
                <td>{{ optional($bpd)->keberadaan_bpd ?? 'Tidak Ada Data' }}</td>
            </tr>
            <tr>
                <th>Jumlah Anggota BPD</th>
                <td>{{ optional($bpd)->jumlah_anggota ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">B. Data Personil & Status Jabatan</div>
    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="20%">Jabatan</th>
                <th width="30%">Nama Personil</th>
                <th width="20%">Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggotaOrganisasis as $anggota)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ optional($anggota->jabatan)->nama_jabatan ?? 'N/A' }}</td>
                    <td>{{ optional($anggota->perangkatDesa)->nama ?? 'Belum Ditunjuk' }}</td>
                    <td>{{ $anggota->status_jabatan }}</td>
                    <td>{{ $anggota->keterangan_tambahan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada penunjukan personil yang tersimpan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>......................., .................. {{ date('Y') }}</p>
        <br><br><br>
        <p>(_____________________)</p>
    </div>

</body>
</html>
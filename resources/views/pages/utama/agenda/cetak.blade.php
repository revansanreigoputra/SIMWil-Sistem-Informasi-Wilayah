<!DOCTYPE html>
<html lang="id">
<head>
    <title>Laporan Agenda Kegiatan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 12px; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Laporan Agenda Kegiatan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Dari Tanggal</th>
                <th>Sampai Tanggal</th>
                <th>Lokasi</th>
                <th>Kegiatan</th>
                <th>Peserta</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agenda as $item)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_dari)->translatedFormat('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_sampai)->translatedFormat('d M Y') }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>{{ $item->peserta }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data agenda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

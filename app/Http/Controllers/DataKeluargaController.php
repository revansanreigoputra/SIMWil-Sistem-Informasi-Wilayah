<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKeluarga; // Sesuaikan dengan nama model KK Anda
use App\Models\AnggotaKeluarga; // Sesuaikan dengan nama model Anggota Anda

class DataKeluargaController extends Controller
{
    /**
     * Menampilkan halaman utama data kepala keluarga.
     */

    public function index()
    {
        // Data tiruan yang lebih lengkap
        $dataKeluarga = collect([
            (object)[
                'id' => 1,
                'no_kk' => '3401010101010001',
                'kepala_keluarga' => 'Budi Santoso',
                'alamat' => 'Jl. Merdeka No. 10',
                'rt' => '001',
                'rw' => '005',
                'dusun' => 'Krajan',
                'bulan' => 'September',
                'tahun' => '2025'
            ],
            (object)[
                'id' => 2,
                'no_kk' => '3401010101010002',
                'kepala_keluarga' => 'Agus Setiawan',
                'alamat' => 'Jl. Pahlawan No. 25',
                'rt' => '002',
                'rw' => '006',
                'dusun' => 'Sawahbulan',
                'bulan' => 'Agustus',
                'tahun' => '2025'
            ],
        ]);

        // Sekarang nama file view disesuaikan dengan yang ada di Canvas
        return view('pages.data_keluarga.index_kk', compact('dataKeluarga'));
    }

    /**
     * Menampilkan formulir untuk membuat KK baru.
     */
    public function createKk()
    {
        return view('pages.data_keluarga.create_kk');
    }

    /**
     * (Dummy) Menyimpan data KK baru.
     */
    public function storeKk(Request $request)
    {
        // Hanya redirect kembali dengan pesan sukses, tanpa menyimpan ke database
        return redirect()->route('data_keluarga.index')->with('success', 'Data Kartu Keluarga berhasil ditambahkan! (Mode Frontend)');
    }

    /**
     * Menampilkan form edit KK.
     */
    public function editKk($id)
    {
        // Data dummy contoh KK yang diedit
        $kk = (object)[
            'id' => $id,
            'no_kk' => '340101010101000' . $id,
            'kepala_keluarga' => $id == 1 ? 'Budi Santoso' : 'Agus Setiawan',
            'alamat' => $id == 1 ? 'Jl. Merdeka No. 10' : 'Jl. Pahlawan No. 25',
            'rt' => $id == 1 ? '001' : '002',
            'rw' => $id == 1 ? '005' : '006',
            'dusun' => $id == 1 ? 'Krajan' : 'Sawahbulan',
            'bulan' => $id == 1 ? 'September' : 'Agustus',
            'tahun' => '2025',
            'nama_pengisi' => 'Admin Desa',
            'pekerjaan' => 'Sekretaris Desa',
            'jabatan' => 'Operator',
            'sumber_data' => 'Data sensus desa 2025'
        ];

        return view('pages.data_keluarga.edit_kk', compact('kk'));
    }

    /**
     * (Dummy) Update KK.
     */
    public function updateKk(Request $request, $id)
    {
        // Tidak ada database, jadi hanya redirect kembali
        return redirect()->route('data_keluarga.index')->with('success', 'Data Kartu Keluarga berhasil diperbarui!');
    }

    /**
     * (Dummy) Hapus KK.
     */
    public function destroyKk($id)
    {
        // Tidak ada database, jadi hanya redirect kembali
        return redirect()->route('data_keluarga.index')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
    }


    /**
     * Menampilkan halaman daftar semua anggota keluarga.
     */
    public function indexAnggota()
    {
        // Data tiruan untuk daftar anggota keluarga
        $anggotaKeluargas = collect([
            (object)[
                'id' => 1,
                'nik' => '3401011212900001',
                'nama_lengkap' => 'Siti Aminah',
                'jenis_kelamin' => 'P',
                'hubungan_keluarga' => 'Istri',
                'kartuKeluarga' => (object)['no_kk' => '3401010101010001', 'kepala_keluarga' => 'Budi Santoso']
            ],
            (object)[
                'id' => 2,
                'nik' => '3401010505150002',
                'nama_lengkap' => 'Joko Susilo',
                'jenis_kelamin' => 'L',
                'hubungan_keluarga' => 'Anak',
                'kartuKeluarga' => (object)['no_kk' => '3401010101010001', 'kepala_keluarga' => 'Budi Santoso']
            ],
        ]);

        return view('pages.data_keluarga.edit', compact('dataKeluarga', 'desas', 'kecamatans', 'perangkatDesas'));
    }

    public function update(Request $request, DataKeluarga $dataKeluarga)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string|unique:data_keluargas,no_kk,' . $dataKeluarga->id,
            'kepala_keluarga' => 'required|string',
            'alamat' => 'required|string',
            'desa_id' => 'required|exists:desas,id',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_pengisi_id' => 'nullable|exists:perangkat_desas,id',
        ]);

        $dataKeluarga->update($validatedData);

        return redirect()->route('data_keluarga.index')->with('success', 'Data Kepala Keluarga berhasil diperbarui.');
    }

    /**
     * (Dummy) Hapus data anggota keluarga.
     */
    public function destroyAk($id)
    {
        // Tidak ada database, jadi hanya redirect kembali
        return redirect()->route('anggota_keluarga.index')->with('success', 'Data Anggota Keluarga berhasil dihapus!');
    }

    /**
     * Menampilkan laporan kepala keluarga.
     */
    public function headsReport()
    {
        return view('pages.data_keluarga.report_keluarga');
    }

    /**
     * Menampilkan laporan anggota keluarga.
     */
    public function membersReport()
    {
        return view('pages.data_keluarga.report_anggota');
    }
}

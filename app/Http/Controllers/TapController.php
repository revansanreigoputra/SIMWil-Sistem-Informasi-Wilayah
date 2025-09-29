<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TapController extends Controller
{

    public function index()
    {

        $taps = [
            [
                'id' => 1, 'tgl_tap' => '2025-09-19', 'nama' => 'Budi Santoso',
                'wilayah_kerja' => 'Wilayah Barat', 'provinsi' => 'DKI Jakarta'
            ],
            [
                'id' => 2, 'tgl_tap' => '2025-08-15', 'nama' => 'Citra Lestari',
                'wilayah_kerja' => 'Wilayah Timur', 'provinsi' => 'Jawa Barat'
            ],
        ];

        return view('pages.utama.tap.index', compact('taps'));
    }


    public function create()
    {
        return view('pages.utama.tap.create');
    }


    public function store(Request $request)
    {

        return redirect()->route('utama.tap.index')->with('success', 'Data TA Pendamping berhasil ditambahkan!');
    }


    public function edit(string $id)
    {

        $tap = [
            'id' => $id,
            'tgl_tap' => '2025-09-19',
            'tahun' => 2025,
            'nama' => 'Budi Santoso (Data Edit)',
            'jns_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'kontak' => '081234567890',
            'email' => 'budi.s@example.com',
            'tlp' => '021-123456',
            'wilayah_kerja' => 'Wilayah Barat',
            'kategori_keahlian' => 'Perencanaan Anggaran',
            'provinsi' => 'DKI Jakarta',
            'kabupaten1' => 'Jakarta Pusat',
            'kabupaten2' => 'Jakarta Selatan',
        ];

        return view('pages.utama.tap.edit', compact('tap'));
    }


    public function update(Request $request, string $id)
    {

        return redirect()->route('utama.tap.index')->with('success', 'Data TA Pendamping berhasil diperbarui!');
    }

    public function destroy(string $id)
    {

        return redirect()->route('utama.tap.index')->with('success', 'Data TA Pendamping berhasil dihapus!');
    }
}

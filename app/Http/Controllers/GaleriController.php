<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{

    /**
     * Menampilkan halaman utama galeri beserta form tambah album.
     */
    public function index()
    {
        // --- DATA DUMMY ---
        $albums = [
            (object)[
                'id' => 1,
                'album' => 'Kegiatan 17 Agustus',
                'photos_count' => 5
            ],
            (object)[
                'id' => 2,
                'album' => 'Studi Tur ke Jakarta',
                'photos_count' => 12
            ],
            (object)[
                'id' => 3,
                'album' => 'Acara Perpisahan Sekolah',
                'photos_count' => 8
            ],
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.galeri.index', compact('albums'));
    }

    /**
     * Menyimpan album baru (simulasi).
     */
    public function store(Request $request)
    {
        // LOGIKA BACKEND (Dilewati): Validasi dan simpan ke database
        return redirect()->route('utama.galeri.index')->with('success', 'Album baru berhasil dibuat!');
    }

    /**
     * Menampilkan detail album beserta foto-fotonya.
     */
    public function show(string $id)
    {
        // --- DATA DUMMY ---
        $album = (object)[
            'id' => $id,
            'album' => 'Kegiatan 17 Agustus',
            'photos' => [
                (object)['id' => 101, 'foto' => 'foto1.jpg'],
                (object)['id' => 102, 'foto' => 'foto2.jpg'],
                (object)['id' => 103, 'foto' => 'foto3.jpg'],
            ]
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.galeri.show', compact('album'));
    }

    /**
     * Menampilkan form untuk edit nama album.
     */
    public function edit(string $id)
    {
        // --- DATA DUMMY ---
        $galeri = (object)[
            'id' => $id,
            'album' => 'Kegiatan 17 Agustus (Nama Lama)',
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.galeri.edit', compact('galeri'));
    }

    /**
     * Memperbarui nama album (simulasi).
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('utama.galeri.index')->with('success', 'Nama album berhasil diperbarui!');
    }

    /**
     * Menghapus sebuah album (simulasi).
     */
    public function destroy(string $id)
    {
        return redirect()->route('utama.galeri.index')->with('success', 'Album berhasil dihapus!');
    }



    public function createPhoto(string $galeri_id)
    {
        // --- DATA DUMMY ---
        $album = (object)[
            'id' => $galeri_id,
            'album' => 'Kegiatan 17 Agustus',
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.galeri.photo.create', compact('album'));
    }

    /**
     * Menyimpan foto baru ke dalam album (simulasi).
     */
    public function storePhoto(Request $request, string $galeri_id)
    {
        return redirect()->route('utama.galeri.show', $galeri_id)->with('success', 'Foto berhasil diupload!');
    }

    /**
     * Menghapus sebuah foto dari album (simulasi).
     */
    public function destroyPhoto(string $galeri_id, string $photo_id)
    {
        return redirect()->route('utama.galeri.show', $galeri_id)->with('success', 'Foto berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita (data dummy).
     */
    public function index()
    {
        // --- DATA DUMMY ---
        $beritas = [
            (object)[
                'id' => 1,
                'judul' => 'Judul Berita Pertama',
                'isi_berita' => 'Ini adalah isi berita pertama.',
                'gambar' => 'sample1.jpg',
                'diupload' => 'Admin',
                'tanggal2' => Carbon::now()->subDays(2)->toDateTimeString()
            ],
            (object)[
                'id' => 2,
                'judul' => 'Berita Kedua Tentang Teknologi Terkini',
                'isi_berita' => 'Ini adalah isi berita kedua.',
                'gambar' => 'sample2.jpg',
                'diupload' => 'User',
                'tanggal2' => Carbon::now()->subDays(5)->toDateTimeString()
            ],
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.berita.index', compact('beritas'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {

        return view('pages.utama.berita.create');
    }

    /**
     * Menyimpan berita baru (simulasi).
     */
    public function store(Request $request)
    {

        return redirect()->route('utama.berita.index')->with('success', 'Berita berhasil ditambahkan! (Simulasi)');
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(string $id)
    {
        // --- DATA DUMMY ---
        $berita = (object)[
            'id' => $id,
            'judul' => 'Judul Berita yang Akan Diedit',
            'isi_berita' => 'Ini adalah isi lengkap dari berita yang sedang diedit. Anda bisa mengubah teks ini di controller.',
            'gambar' => 'sample_edit.jpg',
        ];
        // --- END DATA DUMMY ---

        return view('pages.utama.berita.edit', compact('berita'));
    }

    /**
     * Memperbarui berita yang ada (simulasi).
     */
    public function update(Request $request, string $id)
    {
        // LOGIKA DUMMY
        return redirect()->route('utama.berita.index')->with('success', 'Berita berhasil diperbarui! (Simulasi)');
    }

    /**
     * Menghapus berita (simulasi).
     */
    public function destroy(string $id)
    {

        // LOGIKA DUMMY
        return redirect()->route('utama.berita.index')->with('success', 'Berita berhasil dihapus! (Simulasi)');
    }

   
    public function show(string $id)
    {

        return redirect()->route('utama.berita.index');
    }
}

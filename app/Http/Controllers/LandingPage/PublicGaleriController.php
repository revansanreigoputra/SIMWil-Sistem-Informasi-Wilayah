<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; // Model Album Anda

class PublicGaleriController extends Controller
{
    /**
     * Menampilkan halaman DAFTAR SEMUA ALBUM.
     */
    public function index()
    {
        // Ambil semua album, hitung fotonya, dan paginasi
        // Kita juga 'with('photos')' agar bisa ambil 1 foto sbg cover
        $albums = Galeri::with('photos')->withCount('photos')->latest()->paginate(12);

        return view('public.galeri.index', compact('albums'));
    }

    /**
     * Menampilkan halaman DETAIL (semua foto dalam 1 album).
     * Kita gunakan Route-Model Binding (Galeri $galeri) agar otomatis
     * mengambil album berdasarkan ID di URL.
     */
    public function show(Galeri $galeri)
    {
        // $galeri sudah otomatis berisi data album yang dicari
        // Kita hanya perlu me-load relasi fotonya
        $galeri->load('photos');

        return view('public.galeri.show', [
            'album' => $galeri
        ]);
    }
}

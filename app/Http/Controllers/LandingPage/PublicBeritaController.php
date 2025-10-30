<?php

// UBAH INI
namespace App\Http\Controllers\LandingPage;

// JANGAN UBAH CONTROLLER BIASA
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class PublicBeritaController extends Controller
{
    public function index()
    {
        $semua_berita = Berita::latest()->paginate(9);

        return view('public.berita.index', [
            'daftar_berita' => $semua_berita
        ]);
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita_lain = Berita::where('id', '!=', $berita->id)->latest()->take(3)->get();

        return view('public.berita.show', [
            'berita' => $berita,
            'berita_lain' => $berita_lain
        ]);
    }
}

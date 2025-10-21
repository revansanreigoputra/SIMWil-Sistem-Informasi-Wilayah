<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Controllers\Controller; // <--- INI YANG HILANG. TAMBAHKAN BARIS INI

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan (homepage).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 2. Ambil 4 berita terbaru dari database
        $beritas = Berita::latest()->take(4)->get();

        // 3. Kirim data 'beritas' ke view halaman depan Anda
        // Berdasarkan log eror, nama view Anda adalah 'frontend.home'
        return view('frontend.home', [
            'beritas' => $beritas
        ]);
    }
}

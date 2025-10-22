<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan (homepage).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $beritas = Berita::latest()->take(4)->get();
        $foto_terbaru = Photo::latest()->take(8)->get();


        return view('frontend.home', [
            'beritas' => $beritas,
            'foto_terbaru' => $foto_terbaru
        ]);
    }
}

<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda; // Model Agenda Anda

class PublicAgendaController extends Controller
{
    /**
     * Menampilkan halaman DAFTAR SEMUA AGENDA.
     */
    public function index()
    {
        // Ambil semua agenda, urutkan dari yg terbaru dibuat, dan paginasi
        $agendas = Agenda::latest()->paginate(9);

        return view('public.agenda.index', compact('agendas'));
    }
}

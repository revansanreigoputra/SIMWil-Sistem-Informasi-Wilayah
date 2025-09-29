<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustriPengolahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SektorIndustriPengolahanController extends Controller
{
    // ... (metode store, update, destroy tetap sama)

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Permission check
        if (!Gate::allows('sektor_industri.view')) {
            abort(403, 'Unauthorized action.');
        }

        $sektorIndustriPengolahans = SektorIndustriPengolahan::orderBy('tanggal', 'desc')->get();
        
        // PERUBAHAN PATH VIEW DI SINI
        return view('pages.perkembangan.produk-domestik.sektorindustripengolahan.index', compact('sektorIndustriPengolahans'));
    }

    // ... (metode store, update, destroy tetap sama)
}
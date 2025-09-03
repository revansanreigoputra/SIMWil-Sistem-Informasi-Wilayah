<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKeluarga; // pastikan model ini sudah ada

class DataKeluargaController extends Controller
{
    /**
     * Menampilkan halaman utama data kepala keluarga.
     * Route: GET /data-keluarga
     */
    public function index()
    {
        $dataKeluarga = DataKeluarga::all();

        return view('pages.data_keluarga.index', compact('dataKeluarga'));
    }

    /**
     * Menampilkan formulir untuk membuat data keluarga baru.
     * Route: GET /data-keluarga/create
     */
    public function create()
    {
        return view('pages.data_keluarga.create');
    }

    /**
     * Menyimpan data keluarga baru dari formulir ke database.
     * Route: POST /data-keluarga
     */
    public function store(Request $request)
    {
        // validasi sederhana
        $validated = $request->validate([
            'no_kk'           => 'required|unique:data_keluargas,no_kk',
            'kepala_keluarga' => 'required|string|max:255',
            'alamat'          => 'required|string|max:255',
        ]);

        DataKeluarga::create($validated);

        return redirect()->route('data_keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    /**
     * Menampilkan laporan kepala keluarga.
     * Route: GET /data-keluarga/laporan/kepala-keluarga
     */
    public function headsReport()
    {
        return view('pages.data_keluarga.report_keluarga');
    }

    /**
     * Menampilkan laporan anggota keluarga.
     * Route: GET /data-keluarga/laporan/anggota-keluarga
     */
    public function membersReport()
    {
        return view('pages.data_keluarga.report_anggota');
    }
}

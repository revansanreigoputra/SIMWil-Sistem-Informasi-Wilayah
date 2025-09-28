<?php

namespace App\Http\Controllers;

use App\Models\SubsektorKerajinan;
use Illuminate\Http\Request;

class SubsektorKerajinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data SubsektorKerajinan, diurutkan berdasarkan tanggal terbaru
        $kerajinans = SubsektorKerajinan::orderBy('tanggal', 'desc')->get();

        // Mengirim data ke view index.blade.php
        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.index', compact('kerajinans'));
    }
        public function create()
    {
        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.create');
    }

public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'tanggal' => 'required|date|unique:subsektor_kerajinans,tanggal',
            'total_nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric|min:0',
            'total_biaya_antara_dihabiskan' => 'required|numeric|min:0',
            'total_jenis_kerajinan_rumah_tangga' => 'required|integer|min:0',
        ]);

        // 2. Simpan ke database
        SubsektorKerajinan::create($request->all());

        // 3. Redirect dengan pesan sukses
        return redirect()->route('perkembangan.produk-domestik.subsektor-kerajinan.index')
                         ->with('success', 'Data kerajinan berhasil ditambahkan.');
    }

     public function edit(SubsektorKerajinan $subsektor_kerajinan) // Menggunakan Route Model Binding
    {
        // Variabel di view harus menggunakan $kerajinan sesuai di edit.blade.php
        return view('pages.perkembangan.produk-domestik.subsektor-kerajinan.edit', ['kerajinan' => $subsektor_kerajinan]);
    }

    public function update(Request $request, SubsektorKerajinan $subsektor_kerajinan) // Menggunakan Route Model Binding
    {
        // 1. Validasi Data
        $request->validate([
            // 'unique' diabaikan untuk record yang sedang diedit
            'tanggal' => 'required|date|unique:subsektor_kerajinans,tanggal,' . $subsektor_kerajinan->id,
            'total_nilai_produksi_tahun_ini' => 'required|numeric|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric|min:0',
            'total_biaya_antara_dihabiskan' => 'required|numeric|min:0',
            'total_jenis_kerajinan_rumah_tangga' => 'required|integer|min:0',
        ]);

        // 2. Update data
        $subsektor_kerajinan->update($request->all());

        // 3. Redirect dengan pesan sukses
        return redirect()->route('perkembangan.produk-domestik.subsektor-kerajinan.index')
                         ->with('success', 'Data kerajinan berhasil diperbarui.');
    }

    // Metode resource lainnya (create, store, show, edit, update, destroy)
    // ...
}
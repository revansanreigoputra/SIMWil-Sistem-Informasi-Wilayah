<?php

namespace App\Http\Controllers;

use App\Models\SektorPertambangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorPertambanganController extends Controller
{
   public function index()
{
    // Ambil ID desa dari session login
    $desaId = session('desa_id');

    // Ambil semua data sektor pertambangan sesuai desa login, serta relasi desa
    $data_pertambangan = SektorPertambangan::with('desa')
        ->where('desa_id', $desaId)
        ->latest()
        ->paginate(10);

    // Ambil semua data desa (untuk dropdown di modal tambah data)
    $desas = \App\Models\Desa::all();

    // Kirim ke view
    return view('pages.perkembangan.produk-domestik.sektor-pertambangan.index', compact('data_pertambangan', 'desas'));
}

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-pertambangan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|integer|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|integer|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|integer|min:0',
            'total_biaya_antara_dihabiskan' => 'required|integer|min:0',
            'jumlah_total_jenis_bahan_tambang_dan_galian' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data pertambangan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // 🔹 Pastikan desa_id dari session

        SektorPertambangan::create($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data pertambangan berhasil ditambahkan.');
    }

    public function edit(SektorPertambangan $sektor_pertambangan)
    {
        return view('pages.perkembangan.produk-domestik.sektor-pertambangan.edit', compact('sektor_pertambangan'));
    }

    public function update(Request $request, SektorPertambangan $sektor_pertambangan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|integer|min:0',
            'total_nilai_bahan_baku_digunakan' => 'required|integer|min:0',
            'total_nilai_bahan_penolong_digunakan' => 'required|integer|min:0',
            'total_biaya_antara_dihabiskan' => 'required|integer|min:0',
            'jumlah_total_jenis_bahan_tambang_dan_galian' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data pertambangan.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id'); // Pastikan konsisten

        $sektor_pertambangan->update($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data pertambangan berhasil diperbarui.');
    }

    public function destroy(SektorPertambangan $sektor_pertambangan)
    {
        $sektor_pertambangan->delete();

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data pertambangan berhasil dihapus.');
    }

    public function show($id)
{
    $pertambangan = SektorPertambangan::with('desa')->findOrFail($id);
    return view('perkembangan.produk_domestik.sektor_pertambangan.show', compact('pertambangan'));
}
}

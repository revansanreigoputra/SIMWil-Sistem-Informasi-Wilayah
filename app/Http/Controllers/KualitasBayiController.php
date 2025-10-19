<?php

namespace App\Http\Controllers;

use App\Models\KualitasBayi;
use App\Models\Desa; //  Tambahkan model Desa
use Illuminate\Http\Request;

class KualitasBayiController extends Controller
{
    public function index()
    {
        //  Tampilkan data dengan relasi desa
        $kualitas = KualitasBayi::with('desa')->latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.index', compact('kualitas'));
    }

    public function create()
    {
        //  Ambil semua desa untuk dropdown
        $desas = Desa::all();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.create', compact('desas'));
    }

    public function store(Request $request)
    {
        // Tambahkan validasi desa_id
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'required|integer|min:0',
            'jumlah_bayi_lahir' => 'required|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'required|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'required|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'required|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'required|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'required|integer|min:0',
        ]);

        KualitasBayi::create($request->all());
        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Sertakan relasi desa
        $data = KualitasBayi::with('desa')->findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KualitasBayi::findOrFail($id);
        $desas = Desa::all(); //  Untuk dropdown di edit
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', compact('data', 'desas'));
    }

    public function update(Request $request, $id)
    {
        //  Validasi termasuk desa_id
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'required|integer|min:0',
            'jumlah_bayi_lahir' => 'required|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'required|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'required|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'required|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'required|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'required|integer|min:0',
        ]);

        $data = KualitasBayi::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KualitasBayi::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil dihapus.');
    }
}

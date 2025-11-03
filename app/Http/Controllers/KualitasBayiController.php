<?php

namespace App\Http\Controllers;

use App\Models\KualitasBayi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KualitasBayiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $kualitas = KualitasBayi::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.index', compact('kualitas'));
    }

    public function create()
    {
        // Tidak perlu kirim $desas karena dropdown tidak ditampilkan
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'nullable|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data kualitas bayi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KualitasBayi::create($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = KualitasBayi::with('desa')->findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.show', compact('data'));
    }

    public function edit(KualitasBayi $kualitasBayi)
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', compact('kualitasBayi'));
    }

    public function update(Request $request, KualitasBayi $kualitasBayi)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'nullable|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui data kualitas bayi.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        $kualitasBayi->update($data);

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil diperbarui.');
    }

    public function destroy(KualitasBayi $kualitasBayi)
    {
        $kualitasBayi->delete();

        return redirect()
            ->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\KualitasBayi;
use Illuminate\Http\Request;

class KualitasBayiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id ?? null;

        // Jika bukan admin kabupaten dan belum ada desa aktif
        if (!$desaId && (!$user || $user->role != 'admin_kabupaten')) {
            return redirect()->back()->with('error', 'Silakan pilih desa terlebih dahulu.');
        }

        $kualitas = KualitasBayi::with('desa')
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->latest()
            ->get();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.index', compact('kualitas'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'nullable|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'nullable|integer|min:0',
        ]);

        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        if (is_null($desaId)) {
            return redirect()->back()->with('error', 'Akses ditolak: tidak ada desa aktif.');
        }

        KualitasBayi::create(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasBayi::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'nullable|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'nullable|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'nullable|integer|min:0',
        ]);

        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasBayi::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->update(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasBayi::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil dihapus.');
    }

    public function show($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasBayi::with('desa')
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->findOrFail($id);

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.show', compact('data'));
    }
}

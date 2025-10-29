<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\KualitasPersalinan;
use Illuminate\Http\Request;

class KualitasPersalinanController extends Controller
{
    /**
     * Menampilkan daftar data kualitas persalinan per desa.
     */
    public function index()
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id ?? null;

        // Jika bukan admin kabupaten dan belum ada desa aktif
        if (!$desaId && (!$user || $user->role != 'admin_kabupaten')) {
            return redirect()->back()->with('error', 'Silakan pilih desa terlebih dahulu.');
        }

        // Filter data berdasarkan desa aktif (kecuali admin kabupaten)
        $kualitas = KualitasPersalinan::with('desa')
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->latest()
            ->get();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.index', compact('kualitas'));
    }

    /**
     * Form tambah data kualitas persalinan.
     */
    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.create', compact('desas'));
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'persalinan_rumah_sakit_umum' => 'nullable|integer|min:0',
            'persalinan_puskesmas' => 'nullable|integer|min:0',
            'persalinan_praktek_bidan' => 'nullable|integer|min:0',
            'total_persalinan' => 'nullable|integer|min:0',
            'persalinan_rumah_bersalin' => 'nullable|integer|min:0',
            'persalinan_polindes' => 'nullable|integer|min:0',
            'persalinan_balai_kesehatan_ibu_anak' => 'nullable|integer|min:0',
            'persalinan_praktek_dokter' => 'nullable|integer|min:0',
            'rumah_sendiri' => 'nullable|integer|min:0',
            'rumah_dukun' => 'nullable|integer|min:0',
            'ditolong_dokter' => 'nullable|integer|min:0',
            'ditolong_bidan' => 'nullable|integer|min:0',
            'ditolong_perawat' => 'nullable|integer|min:0',
            'ditolong_dukun_bersalin' => 'nullable|integer|min:0',
            'ditolong_keluarga' => 'nullable|integer|min:0',
        ]);

        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        if (is_null($desaId)) {
            return redirect()->back()->with('error', 'Akses ditolak: tidak ada desa aktif.');
        }

        KualitasPersalinan::create(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data kualitas persalinan.
     */
    public function show($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasPersalinan::with('desa')
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->findOrFail($id);

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.show', compact('data'));
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasPersalinan::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', compact('data'));
    }

    /**
     * Update data kualitas persalinan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'persalinan_rumah_sakit_umum' => 'nullable|integer|min:0',
            'persalinan_puskesmas' => 'nullable|integer|min:0',
            'persalinan_praktek_bidan' => 'nullable|integer|min:0',
            'total_persalinan' => 'nullable|integer|min:0',
            'persalinan_rumah_bersalin' => 'nullable|integer|min:0',
            'persalinan_polindes' => 'nullable|integer|min:0',
            'persalinan_balai_kesehatan_ibu_anak' => 'nullable|integer|min:0',
            'persalinan_praktek_dokter' => 'nullable|integer|min:0',
            'rumah_sendiri' => 'nullable|integer|min:0',
            'rumah_dukun' => 'nullable|integer|min:0',
            'ditolong_dokter' => 'nullable|integer|min:0',
            'ditolong_bidan' => 'nullable|integer|min:0',
            'ditolong_perawat' => 'nullable|integer|min:0',
            'ditolong_dukun_bersalin' => 'nullable|integer|min:0',
            'ditolong_keluarga' => 'nullable|integer|min:0',
        ]);

        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasPersalinan::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->update(array_merge($request->all(), [
            'desa_id' => $desaId,
        ]));

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil diperbarui.');
    }

    /**
     * Hapus data kualitas persalinan.
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $desaId = session('desa_id') ?? $user?->desa_id;

        $data = KualitasPersalinan::where('id', $id)
            ->when($desaId, fn($q) => $q->where('desa_id', $desaId))
            ->firstOrFail();

        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data kualitas persalinan berhasil dihapus.');
    }
}
